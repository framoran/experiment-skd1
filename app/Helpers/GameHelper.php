<?php

namespace App\Helpers;

use DB;
use Illuminate\Support\Collection;

class GameHelper
{
    public function insert()
    {
        /*************** DETECT BROWSER TYPE ***************/
        $arr_browsers = ['Firefox', 'Chrome', 'Safari', 'Opera', 'MSIE', 'Trident', 'Edge'];

        $agent = $_SERVER['HTTP_USER_AGENT'];

        $user_browser = '';
        foreach ($arr_browsers as $browser) {
            if (strpos($agent, $browser) !== false) {
                $user_browser = $browser;
                break;
            }
        }

        switch ($user_browser) {
            case 'MSIE':
                $user_browser = 'Internet Explorer';
                break;

            case 'Trident':
                $user_browser = 'Internet Explorer';
                break;

            case 'Edge':
                $user_browser = 'Internet Explorer';
                break;
        }
        $browser = $user_browser;
        /************** END BROWSER DETECTION *******************/

        $experimentId = htmlspecialchars($_COOKIE['experimentId']);

        if (isset($_COOKIE['eui'])) {
            $eui = htmlspecialchars($_COOKIE['eui']);
        } else {
            $eui = null;
        }

        if ($experimentId != 'demo' && htmlspecialchars($_COOKIE['data_recorded']) != 'recorded') {

            $scoreRTsPractice = htmlspecialchars($_COOKIE['score_practice']);
            $starPractice = htmlspecialchars($_COOKIE['star_practice']);
            $impactPractice = htmlspecialchars($_COOKIE['impact_practice']);
            $checkEssencePractice = htmlspecialchars($_COOKIE['checkEssence_practice']);
            $essenceRightPractice = htmlspecialchars($_COOKIE['essenceRight_practice']);
            $essenceWrongPractice = htmlspecialchars($_COOKIE['essenceWrong_practice']);
            $drawingPractice = htmlspecialchars($_COOKIE['drawing_practice']);
            $tirMissilePractice = htmlspecialchars($_COOKIE['tirMissile_practice']);
            $impactMissilePractice = htmlspecialchars($_COOKIE['impactMissile_practice']);
            $score = htmlspecialchars($_COOKIE['score']);
            $star = htmlspecialchars($_COOKIE['star']);
            $impact = htmlspecialchars($_COOKIE['impact']);
            $checkEssence = htmlspecialchars($_COOKIE['checkEssence']);
            $essenceRight = htmlspecialchars($_COOKIE['essenceRight']);
            $essenceWrong = htmlspecialchars($_COOKIE['essenceWrong']);
            $dateNewRefuelWindow = htmlspecialchars($_COOKIE['dateNewRefuelWindow']);
            $numberMustRefuel = htmlspecialchars($_COOKIE['numberMustRefuel']);
            $drawing = htmlspecialchars($_COOKIE['drawing']);
            $tirMissile = htmlspecialchars($_COOKIE['tirMissile']);
            $impactMissile = htmlspecialchars($_COOKIE['impactMissile']);
            $scoreSum = htmlspecialchars($_COOKIE['sumScore']);
            $meanRTs = htmlspecialchars($_COOKIE['meanRTs']);
            $prediction = isset($_COOKIE['prediction']) ? htmlspecialchars($_COOKIE['prediction']) : 0;
            $postdiction = isset($_COOKIE['postdiction']) ? htmlspecialchars($_COOKIE['postdiction']) : 0;

            // Get score
            for ($i = 1; $i <= 42; $i++) {
                ${'score'.$i} = htmlspecialchars($_COOKIE['ScoreResp'.$i]);
                ${'scoreRTs'.$i} = htmlspecialchars($_COOKIE['ScoreRTs'.$i]);
            }

            $data = [

                'experimentId' => $experimentId,
                'user_id' => $eui,
                'browser' => $browser,
                'scorePractice' => $scoreRTsPractice,
                'drawingPractice' => $drawingPractice,
                'tirMissilePractice' => $tirMissilePractice,
                'missileImpactPractice' => $impactMissilePractice,
                'dateToucheEtoilePractice' => $starPractice,
                'dateToucheObstaclePractice' => $impactPractice,
                'dateToucheNiveauEssencePractice' => $checkEssencePractice,
                'dateFaitLePleinPractice' => $essenceRightPractice,
                'dateFaitLePleinMauvaisMomentPractice' => $essenceWrongPractice,
                'score' => $score,
                'drawing' => $drawing,
                'tirMissile' => $tirMissile,
                'missileImpact' => $impactMissile,
                'dateToucheEtoile' => $star,
                'dateToucheObstacle' => $impact,
                'dateToucheNiveauEssence' => $checkEssence,
                'dateFaitLePlein' => $essenceRight,
                'dateFaitLePleinMauvaisMoment' => $essenceWrong,
                'dateNewRefuelWindow' => $dateNewRefuelWindow,
                'numberMustRefuel' => $numberMustRefuel,
                'interTaskSumScore' => $scoreSum,
                'interTaskMeanRTs' => $meanRTs,
                'interTaskScore1' => $score1,
                'interTaskScore2' => $score2,
                'interTaskScore3' => $score3,
                'interTaskScore4' => $score4,
                'interTaskScore5' => $score5,
                'interTaskScore6' => $score6,
                'interTaskScore7' => $score7,
                'interTaskScore8' => $score8,
                'interTaskScore9' => $score9,
                'interTaskScore10' => $score10,
                'interTaskScore11' => $score11,
                'interTaskScore12' => $score12,
                'interTaskScore13' => $score13,
                'interTaskScore14' => $score14,
                'interTaskScore15' => $score15,
                'interTaskScore16' => $score16,
                'interTaskScore17' => $score17,
                'interTaskScore18' => $score18,
                'interTaskScore19' => $score19,
                'interTaskScore20' => $score20,
                'interTaskScore21' => $score21,
                'interTaskScore22' => $score22,
                'interTaskScore23' => $score23,
                'interTaskScore24' => $score24,
                'interTaskScore25' => $score25,
                'interTaskScore26' => $score26,
                'interTaskScore27' => $score27,
                'interTaskScore28' => $score28,
                'interTaskScore29' => $score29,
                'interTaskScore30' => $score30,
                'interTaskScore31' => $score31,
                'interTaskScore32' => $score32,
                'interTaskScore33' => $score33,
                'interTaskScore34' => $score34,
                'interTaskScore35' => $score35,
                'interTaskScore36' => $score36,
                'interTaskScore37' => $score37,
                'interTaskScore38' => $score38,
                'interTaskScore39' => $score39,
                'interTaskScore40' => $score40,
                'interTaskScore41' => $score41,
                'interTaskScore42' => $score42,
                'interTaskScoreRTs1' => $scoreRTs1,
                'interTaskScoreRTs2' => $scoreRTs2,
                'interTaskScoreRTs3' => $scoreRTs3,
                'interTaskScoreRTs4' => $scoreRTs4,
                'interTaskScoreRTs5' => $scoreRTs5,
                'interTaskScoreRTs6' => $scoreRTs6,
                'interTaskScoreRTs7' => $scoreRTs7,
                'interTaskScoreRTs8' => $scoreRTs8,
                'interTaskScoreRTs9' => $scoreRTs9,
                'interTaskScoreRTs10' => $scoreRTs10,
                'interTaskScoreRTs11' => $scoreRTs11,
                'interTaskScoreRTs12' => $scoreRTs12,
                'interTaskScoreRTs13' => $scoreRTs13,
                'interTaskScoreRTs14' => $scoreRTs14,
                'interTaskScoreRTs15' => $scoreRTs15,
                'interTaskScoreRTs16' => $scoreRTs16,
                'interTaskScoreRTs17' => $scoreRTs17,
                'interTaskScoreRTs18' => $scoreRTs18,
                'interTaskScoreRTs19' => $scoreRTs19,
                'interTaskScoreRTs20' => $scoreRTs20,
                'interTaskScoreRTs21' => $scoreRTs21,
                'interTaskScoreRTs22' => $scoreRTs22,
                'interTaskScoreRTs23' => $scoreRTs23,
                'interTaskScoreRTs24' => $scoreRTs24,
                'interTaskScoreRTs25' => $scoreRTs25,
                'interTaskScoreRTs26' => $scoreRTs26,
                'interTaskScoreRTs27' => $scoreRTs27,
                'interTaskScoreRTs28' => $scoreRTs28,
                'interTaskScoreRTs29' => $scoreRTs29,
                'interTaskScoreRTs30' => $scoreRTs30,
                'interTaskScoreRTs31' => $scoreRTs31,
                'interTaskScoreRTs32' => $scoreRTs32,
                'interTaskScoreRTs33' => $scoreRTs33,
                'interTaskScoreRTs34' => $scoreRTs34,
                'interTaskScoreRTs35' => $scoreRTs35,
                'interTaskScoreRTs36' => $scoreRTs36,
                'interTaskScoreRTs37' => $scoreRTs37,
                'interTaskScoreRTs38' => $scoreRTs38,
                'interTaskScoreRTs39' => $scoreRTs39,
                'interTaskScoreRTs40' => $scoreRTs40,
                'interTaskScoreRTs41' => $scoreRTs41,
                'interTaskScoreRTs42' => $scoreRTs42,
                'prediction' => $prediction,
                'postdiction' => $postdiction
            ];

            DB::table('game')->insert($data);

        }

        setcookie('data_recorded', 'recorded', time() + (86400 * 30), '/'); // 86400 = 1 day

    }
}
