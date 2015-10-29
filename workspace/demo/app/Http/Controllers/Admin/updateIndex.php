<?php

 //    system("php /var/www/demo/app/Http/Controllers/Admin/bulidDeltaIndex.php");

	// system("php /var/www/demo/app/Http/Controllers/Admin/mergeIndex.php");


	// pclose(popen("sudo indexer testdelta --rotate","r"));
	// pclose(popen('sudo indexer --merge test1 testdelta --rotate',"r"));


	// proc_close(proc_open ("sudo indexer testdelta --rotate", array(), $foo));
    
 //    sleep(10);


    system("sh /var/www/demo/app/Http/Controllers/Admin/merge.sh");
	// system("sudo indexer testdelta --rotate");
	// system("sudo service sphinxsearch restart");
	// system("sudo indexer --merge test1 testdelta --rotate");
 //    $pipes;
 //    $descriptorspec = array(
	// 	0 => array("pipe", "r"),  // 标准输入，子进程从此管道中读取数据
	// 	1 => array("pipe", "w"),  // 标准输出，子进程向此管道中写入数据
	// 	2 => array("file", "/tmp/error-output.txt", "a") // 标准错误，写入到一个文件
	// );

	// $cwd = '/tmp';
	// $env = array('some_option' => 'aeiou');

	// $process = proc_open('sudo indexer testdelta', array(), $pipes, NULL, NULL);
	
	// $file = fopen("/var/www/log.txt","w");
	// $i = 0;
	// $status = proc_get_status($process);
	// while ($status['running'] == TRUE) {
	// 	$i += 1;
	// 	// fwrite($file, $i);
	// 	$status = proc_get_status($process);

	// 	if ($status['running'] == False) {
	// 		$return_value = proc_close($process);


	// 		fwrite($file, 'ppppppppppppppp'.$status['exitcode'].'ppppppppppppppp');
	// 		// exec('sudo indexer --merge test1 testdelta --rotate');
	// 		exec('sudo indexer --merge test1 testdelta');
	// 	}
	// }

	// fwrite($file, $i);
 //    fclose($file);
    // sleep(0.1);
    // system('sudo indexer --merge test1 testdelta --rotate');
	// $return_value = proc_close($process);

	// $pipe;
	// $process = proc_open('sudo indexer --merge test1 testdelta --rotate', array(), $pipe, NULL, NULL);
	// $return_value = proc_close($process);



