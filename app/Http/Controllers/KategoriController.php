<?php

namespace App\Http\Controllers;
use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function index(){
        return response()->json(Kategori::all());
    }

    public function show($id)
    {   
        $kategori = Kategori::find($id);
        return response()->json($kategori);
    }

    public function create(Request $request)
    {
        $kategori= Kategori::create($request->all());

        return response()->json($kategori, 201);
    }

    public function update($id, Request $request)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return response()->json($kategori, 200);
    }
    
    public function delete($id)
    {
        Kategori::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }    
}
