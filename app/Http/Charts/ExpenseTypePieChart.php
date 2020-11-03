<?php
namespace App\Http\Charts;

use App\Models\UserTransactionSource;
use App\Services\AccountBalanceService;



class ExpenseTypePieChart {
    public static function createChart($userId)
    {
        $data = self::getData($userId);

        if(!$data['labels']) {
            return false;
        }

        $colors = [
            // Blue
            '#36A2EB',
            // Red
            '#FF6384',
            // Yellow
            '#ffef63',
            // Green
            '##85ff63',
            // Orange
            '#eba336',
        ];

        $chart = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels($data['labels'])
            ->datasets([
                [
                    'backgroundColor' => $colors,
                    'hoverBackgroundColor' => $colors,
                    'data' => $data['datapoints']
                ]
            ])
            ->options([]);

        return $chart;
    }

    private static function getData($userId)
    {
        $data = [
            'labels' => [],
            'datapoints' => []
        ];
        $spendingPerSource = AccountBalanceService::getSpendingPerSource($userId);

        foreach($spendingPerSource as $sourceGroup)
        {
            $sourceName = UserTransactionSource::find($sourceGroup->source_id)->name;
            $data['labels'][] = ucwords($sourceName);
            $data['datapoints'][] = $sourceGroup->total;
        }

        return $data;
    }
}
?>
