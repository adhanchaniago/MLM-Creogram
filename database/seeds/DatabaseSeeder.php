<?php

use App\IncomeChartFilter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MemberTableSeeder::class);
        $this->call(GoldMemberSeeder::class);
        $this->call(CompanyMemberSeeder::class);
        $this->call(SerialNumberSeeder::class);
        $this->call(IncomeChartFilterSeeder::class);
        $this->call(ClientTransactionSeeder::class);
    }
}
