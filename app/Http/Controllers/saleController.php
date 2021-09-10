<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Product;
class saleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::paginate(5);
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->where('stock','>', 0);
        return view('sales.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            $request->validate([
            'product'    => 'required',
            'amount'     => 'required|numeric',
            'description'=> 'required',
            ],
            [
            'product.required'=>'Producto obligatorio.'
            ]);

            $selectProducts = [];
            $selectProducts['product'] = $request['product'];

            $sale  = new Sale;
            $sale->amount = $request->amount;
            $sale->description = $request->description;

                foreach ($selectProducts as $productId) {
                    $product = new Product;
                    $product = Product::findOrfail($productId[0]);
                    if ($product->stock >= $sale->amount) {
                        $sale->save();
                        $sale->products()->attach($product->id);
                        DB::table('products')->where('id','=', $product->id)->decrement('stock', $sale->amount);
                        alert()->success('SuccessAlert','Venta realizada con exito!');
                        return redirect('/sales');
                    }else{
                        alert()->error('ErrorAlert','El estock no es sufieciente para vender '.$sale->amount. ' '.$product->name);
                        return redirect('/sales');
                    }
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = sale::findOrfail($id);
        $products = $sale->products;
        $total = 0;
         foreach ($products as $value) {
             $total += $value->price * $sale->amount;
         }
        return view('sales.show', compact('sale','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::findOrfail($id);
        return view('sales.edit', compact('sale'));
    }
}
