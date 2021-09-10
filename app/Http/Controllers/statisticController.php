<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sale;
use App\Product;
use App\Trademark;


class statisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countSales = sizeof(Sale::all());
        $countProducts = sizeof(Product::all());
        $countTrademarks = sizeof(Trademark::all());
        return view('statistic.index', compact('countSales','countProducts','countTrademarks'));
    }
}
