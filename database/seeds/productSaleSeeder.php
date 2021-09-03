<?php

use App\sale_product;
use Illuminate\Database\Seeder;

class productSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(sale_product::class, 30)->create();
    }
}
