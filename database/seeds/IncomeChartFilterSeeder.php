<?php

use Illuminate\Database\Seeder;
use App\IncomeChartFilter;

class IncomeChartFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncomeChartFilter::create([
            'from' => '2020-07-12',
            'to' => '2020-07-18',
        ]);

        IncomeChartFilter::create([
            'from' => '2020-07-19',
            'to' => '2020-07-25',
        ]);

        IncomeChartFilter::create([
            'from' => '2020-07-26',
            'to' => '2020-08-01',
        ]);

        IncomeChartFilter::create([
            'from' => '2020-08-02',
            'to' => '2020-08-08',
        ]);

        IncomeChartFilter::create([
            'from' => '2020-08-09',
            'to' => '2020-08-15',
        ]);
    }
}
