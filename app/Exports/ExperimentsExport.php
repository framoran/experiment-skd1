<?php

namespace App\Exports;

use Auth;
use DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExperimentsExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        // Check whether it is the owner of the data
        $experiment_owner = DB::table('experiments')
            ->where('id', '=', $_GET['experiment'])
            ->value('user_id');

        if ($experiment_owner == Auth::user()->id) {
            $data = DB::table('game')
                ->where('experimentId', '=', $_GET['experiment'])
                ->get();
        }

        return $data;

    }

    public function headings(): array
    {
        return [
            'id',
            'ExperimentID',
            'user_id',
            'browser',
            'scorePractice',
            'drawingPractice',
            'firedMissilePractice',
            'missileImpactPractice',
            'dateStarCollectedPractice',
            'dateCollisionObstaclePractice',
            'dateCheckFuelPractice',
            'dateRefuelCorrectPractice',
            'dateRefuelIncorrectPractice',
            'score',
            'drawing',
            'fireMissile',
            'missileImpact',
            'dateStarCollected',
            'dateCollisionObstacle',
            'dateCheckRefuel',
            'dateRefuelCorrect',
            'dateRefuelIncorrect',
            'dateNewRefuelWindow',
            'dateNumberMustRefuel',
            'interTaskMeanRTs',
            'interTaskSumScore',
            'interTaskScore1',
            'interTaskScore2',
            'interTaskScore3',
            'interTaskScore4',
            'interTaskScore5',
            'interTaskScore6',
            'interTaskScore7',
            'interTaskScore8',
            'interTaskScore9',
            'interTaskScore10',
            'interTaskScore11',
            'interTaskScore12',
            'interTaskScore13',
            'interTaskScore14',
            'interTaskScore15',
            'interTaskScore16',
            'interTaskScore17',
            'interTaskScore18',
            'interTaskScore19',
            'interTaskScore20',
            'interTaskScore21',
            'interTaskScore22',
            'interTaskScore23',
            'interTaskScore24',
            'interTaskScore25',
            'interTaskScore26',
            'interTaskScore27',
            'interTaskScore28',
            'interTaskScore29',
            'interTaskScore30',
            'interTaskScore31',
            'interTaskScore32',
            'interTaskScore33',
            'interTaskScore34',
            'interTaskScore35',
            'interTaskScore36',
            'interTaskScore37',
            'interTaskScore38',
            'interTaskScore39',
            'interTaskScore40',
            'interTaskScore41',
            'interTaskScore42',
            'interTaskScoreRTs1',
            'interTaskScoreRTs2',
            'interTaskScoreRTs3',
            'interTaskScoreRTs4',
            'interTaskScoreRTs5',
            'interTaskScoreRTs6',
            'interTaskScoreRTs7',
            'interTaskScoreRTs8',
            'interTaskScoreRTs9',
            'interTaskScoreRTs10',
            'interTaskScoreRTs11',
            'interTaskScoreRTs12',
            'interTaskScoreRTs13',
            'interTaskScoreRTs14',
            'interTaskScoreRTs15',
            'interTaskScoreRTs16',
            'interTaskScoreRTs17',
            'interTaskScoreRTs18',
            'interTaskScoreRTs19',
            'interTaskScoreRTs20',
            'interTaskScoreRTs21',
            'interTaskScoreRTs22',
            'interTaskScoreRTs23',
            'interTaskScoreRTs24',
            'interTaskScoreRTs25',
            'interTaskScoreRTs26',
            'interTaskScoreRTs27',
            'interTaskScoreRTs28',
            'interTaskScoreRTs29',
            'interTaskScoreRTs30',
            'interTaskScoreRTs31',
            'interTaskScoreRTs32',
            'interTaskScoreRTs33',
            'interTaskScoreRTs34',
            'interTaskScoreRTs35',
            'interTaskScoreRTs36',
            'interTaskScoreRTs37',
            'interTaskScoreRTs38',
            'interTaskScoreRTs39',
            'interTaskScoreRTs40',
            'interTaskScoreRTs41',
            'interTaskScoreRTs42',
            'dateRecord',
        ];
    }
}
