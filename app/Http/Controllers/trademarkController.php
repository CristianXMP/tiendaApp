<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;

use App\Trademark;
class trademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trademarks = Trademark::paginate(5);
        return view('trademark.index', compact('trademarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trademark.create');
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
            'name'        => 'required|unique:trademarks|max:100',
            'reference'   => 'required|numeric|unique:trademarks',
            'description' => 'required'
            ],
            [
            'name.unique' => 'Ya existe una marca con este nombre',
            ]);

            $trademark = new Trademark;
            $trademark->name        = $request->name;
            $trademark->reference   = $request->reference;
            $trademark->description = $request->description;

            if ($trademark->save()) {
                toast('Marca creada con exito!','success');
                return redirect('/trademarks');
            }else{
                toast('Marca no creada','error');
                return redirect('/trademarks');
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
        $trademark = Trademark::findOrfail($id);
        return view('trademark.show', compact('trademark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trademark = Trademark::findOrfail($id);
        return view('trademark.edit', compact('trademark'));
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
            'name'        => 'required|max:100',
            'reference'   => 'required|numeric',
            'description' => 'required'
             ],[
             'name.unique' => 'Ya existe una marca con este nombre',
             ]);

            $trademark = Trademark::findOrfail($id);
            $trademark->name        = $request->name;
            $trademark->reference   = $request->reference;
            $trademark->description = $request->description;

            if ($trademark->save()) {
            toast('Marca actualizada con exito!','success');
            return redirect('/trademarks');
            }else{
            toast('Marca no actualizada','error');
            return redirect('/trademarks');
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
        $trademark = Trademark::findOrFail($id);
        $trademark->delete();
        toast('Marca eliminada con exito!','success');
        return redirect('/trademarks');
    }
}
