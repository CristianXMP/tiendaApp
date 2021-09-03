<?php

use Illuminate\Database\Seeder;
use App\Sale;
class saleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sale::class, 30)->create();
    }
}
