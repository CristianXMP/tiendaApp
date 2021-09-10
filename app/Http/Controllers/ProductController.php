<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use App\Product;
use App\Trademark;
Use Alert;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trademarks = Trademark::all();
        $sizes =  array( 'S', 'M',  'L') ;
        return view('products.create', compact('trademarks','sizes'));
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

            'name'          => 'required|unique:products',
            'size'          => 'required',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
            'trademark'     => 'required',
            'observation'   => 'required',
            'shipping_date' => 'required|date',
            ],
            ['name.unique'=>'Ya existe un productor con este nombre.']);

            $product = new Product;
            $product->name           = $request->name;
            $product->size           = $request->size;
            $product->price          = $request->price;
            $product->stock          = $request->stock;
            $product->observation    = $request->observation;
            $product->trademark_id   = $request->trademark;
            $product->shipping_date  = $request->shipping_date;

            if ($product->save()) {
                toast('Producto creado con exito!','success');
                return redirect('/products');
            }else{
                toast('No se creo el producto!','error');
                return redirect('/products');
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
       $product = Product::findOrfail($id);
       return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trademarks = Trademark::all();
        $sizes =  array( 'S', 'M',  'L') ;
        $product = Product::findOrfail($id);
        return view('products.edit', compact('product', 'trademarks', 'sizes'));
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
            $request->validate([

            'name'         => 'required',
            'size'         => 'required',
            'stock'        => 'required|numeric',
            'price'        => 'required|numeric',
            'trademark'    => 'required',
            'observation'  => 'required',
            'shipping_date'=> 'required|date',

            ]);

        $product = Product::findOrfail($id);

        $product->name           = $request->name;
        $product->size           = $request->size;
        $product->price          = $request->price;
        $product->stock          = $request->stock;
        $product->observation    = $request->observation;
        $product->trademark_id   = $request->trademark;
        $product->shipping_date  = $request->shipping_date;

        if($product->save()){
            toast('Producto actualizado con exito!','success');
            return redirect('/products');
        }else{
            toast('No se pudo actualizar','error');
            return redirect('/products');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        toast('Producto eliminado con exito!','success');
        return redirect('/products');
    }
}
