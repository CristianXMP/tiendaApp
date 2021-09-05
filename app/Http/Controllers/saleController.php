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
        /*$sales = $sale->products;
        foreach ($sales as $sale) {
            $suma += $sale->price;
        }

        echo "Suma: $suma";*/
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


        $valdiate = $request->validate([
            'description'=> 'required',
            'product'=> 'required'

        ],
        [
            'product.required'=>'Producto obligatorio.'
        ]);
        $selectProducts = [];
        $selectProducts['product'] = $request['product'];


            $sale  = new Sale;
            $sale->description = $request->description;
            if($sale->save()){
                foreach ($selectProducts as $key => $value) {
                    $sale->products()->attach($value);
                    DB::table('products')->where('id','=', $value)->decrement('stock', 1);
                }

                toast('Venta realizada con exito!','success');
                return redirect('/sales');

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
             $total += $value->price;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
