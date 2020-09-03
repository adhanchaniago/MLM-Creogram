<?php

use Illuminate\Database\Seeder;
use App\CompanyMember;

class CompanyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyMember::create([
            'full_name' => 'admin',
            'email' => 'admin@company.com',
            'password' => '123123123',
            'role' => 'admin'  
        ]);
    }
}
