<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request, Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect, Input;

use App\Lib\SphinxClient;


class SphinxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // use sphinxapi to search by keyword
        $data = Input::json();
        $keyword = $data->get('keyword');
        $rank_mode = $data->get('rank_mode');
        $match_mode = $data->get('match_mode');


        $cl = new SphinxClient();
        $cl->setServer('127.0.0.1', 9312);

        /// match modes
        switch ($match_mode) {
            case "SPH_MATCH_BOOLEAN":
                $cl->setMatchMode(SPH_MATCH_BOOLEAN);
                break;
            case "SPH_MATCH_ANY":
                $cl->setMatchMode(SPH_MATCH_ANY);
                break;
            case "SPH_MATCH_ALL":
                $cl->setMatchMode(SPH_MATCH_ALL);
                break;
            // case "SPH_MATCH_FULLSCAN":
            //     $cl->setMatchMode(SPH_MATCH_FULLSCAN);
            //     break;
            default:
                $cl->setMatchMode(SPH_MATCH_BOOLEAN);
                break;
        }

        /// ranking modes (ext2 only)
        switch ($rank_mode) {
            case "SPH_RANK_PROXIMITY_BM25":
                $cl->setRankingMode(SPH_RANK_PROXIMITY_BM25);
                break;
            case "SPH_RANK_NONE":
                $cl->setRankingMode(SPH_RANK_NONE);
                break;
            case "SPH_RANK_WORDCOUNT":
                $cl->setRankingMode(SPH_RANK_WORDCOUNT);
                break;
            case "SPH_RANK_SPH04":
                $cl->setRankingMode(SPH_RANK_SPH04);
                break;
            default:
                $cl->setRankingMode(SPH_RANK_WORDCOUNT);
                break;
        }

        // can set weight for each attribute

        $result = $cl->Query('asia aspect aspects assess assessment assigned associated association associations assume assumed atc attaining attempt attend attendance attention attitude attract attracting attractiveness attributable attributed australia australian author authors avoid avoided balance bar based baseline basic basis bearing believes benefit benefits best better bid bidding bids board boost break bring bringing broadcasters broadly building burdens buying byproduct byproducts calculated calculations called canada candidates capability capable carefully carries case categorically caused centered centre chalip challenge change changes characteristics china chosen cities city claim classified clear clearing clearly close closely clustering coefficient coefficients combined commission comparable compare compared comparing comparison comparisons complete completely comprehensive comprises compute concept concepts conceptual conclude concluded concluding conclusion conclusions conditions conducted conferences confidence conflicts connecting considerably consideration considered consistency consistent consolidated constant construct constructed consumption context contextual continual continuously contrast contributes control controlled controlling controls cook correct correction correlation costanzo count countries country county couple coupled cover covers create created creates creating criterion critical cultural cup currency current cut data database dataset datasets dates decision decline decrease decreases decreasing deductions definite deflated deflators demonstrate denote denoted departure dependent depends descriptive desirable destination determine developing development deviations dictated difference differs difficult diminishing dips directly discussed display displayed displays disregard distinguish distinguishing distributed dollars downside draw drawn drop dummies dummy earlier early easily economic economics economy edward effective effects efforts element elevated emphasize empirical enable endorses enjoy enjoying entails entering enterprise entire entrepreneurialism equally equation errors estimated evaluate evaluation event events everlasting evidence examine examined examines examining example examples excluded excluding execution executions exhibit exhibited existing exists expect expectation expects expenditures experience experienced explain explained explores expos extends external extremely facilitating facilities factor factors fall familiarization family february fifa figure figures filling final financial find finding findings finds fitted fixed flow flows fluctuate fluctuations focus focused focuses focusing follow football forecasted foreign form frame france free frequency fresh full fully fund fundamentally funding future games gap gates gdp geared general generally generate generated generates generating global goal goals goods government granted graph graphed graphs great greater greatest greatly groups growth guarantees hard haverford heavily heavy held help helping heterogeneity heteroskedasticity heying high higher highlight highly hire historical hold hometowns hope host hosted hosting hosts howard howell hughes hypotheses hypothesize ideas identify iii illustrated illustrates image imf impact impacts implying impression improved improvement inaccuracy inadequate include included includes including inclusion incongruities increase increased increases increasing independent indicators indirect individual influence influenced infrastructural infrastructure inhabitants initial inserted insight insignificant instrumental intent interesting internal international internationally introductions investigates investment involve involves issues january japan john johnson joint journal journalists june kang kasimati kingdom korea lack laid languages large larger largest lasting lasts lead leading learning leave leaving lectures lee legacy les level levels limited listing literature local locale locales location locations long longer longitudinal los loss lynne magnitude main majority making marginally market maximize meaning measure measured measures media mega megabid megahost megahostbidpast megahostpast mentioned mexico millions mirror miscalculation misrepresentation missing model modes modified monetary money month monthly months motivation moved nationally naturally nature negative negatively net note notes noteworthy notice noticed noting number numbers numerous objective observations observed observes observing occur occurred occurrence occurring occurs offer offset offsets olimpics ols olympic olympicbid olympicbidpast olympichost olympichostbid olympichostbidpast olympichostpast olympics online opinion opinions opportunities opposite optimise order ordinary organizational original outbreak outcome outcomes overshadows paper paradigm parallel partially pass passing pattern patterns payments people percentage perdue period phase phases place places planned planning plausible plays points political poor popularity population populations portion positioned positive positively possibility postcards potential power predicted prediction preliminary preparation presence presented presents press previous primary prior private privilege problems produce produced produces profit profound progression project projected prominent proper prove provide provided providing public publicity purpose purposes pyo qualitatively questionnaire questionnaires quoted rapidly raw reading real reasonable reasoning receive received receives recognize recognized referred refers reflections reflective regard regarded region regional regression regressions relating relation relations reliable reliant remain removal removed removing repair report reported represent representing represents require requirements requires researchers respective result retrieved return returning returns reveal reveals revenues review richard richer rienner rises risk roche rogerson role rose runners running sars scattered scholarly scholars seaports second sector sectors seek sending seoul september serious serve served services set shared sharing shifted shifting short showcase showcased sides sign signal significance signs similarities simple site sizable size skewed small smaller social solely sources south southern span spanned spans specific spiegel spike spikes sport sporting stage staging standard starting state stated states statistically statistics stay stems stimulation stories strategic strategy studied studies study subject substance substantial success successful summer summerbid summerbidpast summerbidtpast summerhost summerhostbid summerhostbidpast summerhostpast support surprising surrounding surveying sustained sweden switzerland sydney synopsis table tables takes taylor technological technology ten tend term terminology terms terrorism test tested testing theoretical thesis third three ticket time timeframe titled tokyo topic total touches tourism tourist tourists trade transport transportation travel traveled travelers tremendous trend trends true twelve type types typical typically tyrell ultimately unavailability unavailable unclear undeniable understand understanding understood undertones undetectable undeveloped unexpected unique uniqueness united university unpredictability unrealistic unsuccessful unsuccessfully upgrade upward urban usd vague values variable variables variation variety vary version versions versus video visible visibly visit visited visiting visitors visits visuals wanted washington ways web weed weigh weight well will winter winterbidpast winterhost winterhostbid winterhostbidpast winterhostpast worldcupbid worldcuphost', 'test1, testrt');
        $idList = array();

        if ($result['total_found'] != '0') {
            foreach ($result['matches'] as $key => $val) {
                $idList[] = $key;
            }
        }

        return Response::json(['data' => $idList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }
}
