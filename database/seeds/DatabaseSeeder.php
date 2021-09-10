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
        $this->call(TrademarkSeeder::class);
        $this->call(productSeeder::class);
        //$this->call(saleSeeder::class);
    }
}
