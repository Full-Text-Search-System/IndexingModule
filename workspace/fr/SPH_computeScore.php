<?php 

include_once('SphinxClient.php');


$vectorFiles = array();
// read doc name from database


// read SPH_score.txt file to an array, each line is an element in the array
$lines = array();
$scoreFile = fopen('SPH_score.txt', 'r');
while (!feof($scoreFile)) {
	$line = explode(':', fgets($scoreFile));
	$lines[$line[0]] = $line[1];
}
fclose($scoreFile);

foreach ($vectorFiles as $vector) {
	computeScore('V_'.$vector, $lines);
}

// write score matrix into SPH_score.txt




$scoreFile = fopen('SPH_score.txt', 'w');
foreach ($lines as $key => $val) {
	fwrite($scoreFile, $key.":"."\r\n");
}
fclose($scoreFile);

// foreach doc, compute score and append result to SPH_score.txt
function computeScore($vector, $scoreMatrix) {
	/*********************************
	* compute score between two file *
	**********************************/

	// SetIDRange
	$cl = new SphinxClient();
    $cl->setServer('127.0.0.1', 9312);
    
    $cl->setMatchMode(SPH_MATCH_ANY);
    $cl->setRankingMode(SPH_RANK_BM25);

    // can set weight for each field

    $vFile = fopen($vector, 'r');
	$v = "";
	$s = floatval(fgets($vFile));
	$time = 0;
	while (!feof($vFile)) {
		$line = explode(" ", fgets($vFile));
		if (floatval($line[1]) < 10) continue;
		// $tf = floatval($line[1]) / $s1;
		$v .= " ".$line[0];
		$time++;
	}
	fclose($vFile);

    $result = $cl->Query($v, 'test1, testrt');
    
    $docID = "";
    $newRecord = "";

    foreach ($scoreMatrix as $row => $col) {
		$col .= ','.$docID.'|'.$result['matches'][$row]['weight'];
		$newRecord .= ','.$row.'|'.$result['matches'][$row]['weight'];
    }
    $scoreMatrix[$docID] = $newRecord;
}
