<?php

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
         $this->call(UsersTableSeeder::class);
         $this->call(OsTableSeeder::class);
         $this->call(VoucherTableSeeder::class);
         $this->call(FeatureTableSeeder::class);
         $this->call(PlanTableSeeder::class);
    }
}
