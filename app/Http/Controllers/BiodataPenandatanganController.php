<?php

namespace App\Http\Controllers;
use App\BiodataPenandatangan;
use Illuminate\Http\Request;

class BiodataPenandatanganController extends Controller
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
        return response()->json(BiodataPenandatangan::all());
    }

    public function show($id)
    {   
        $biodata = BiodataPenandatangan::find($id);
        return response()->json($biodata);
    }

    public function create(Request $request)
    {
        $biodata= BiodataPenandatangan::create($request->all());

        return response()->json($biodata, 201);
    }

    public function update($id, Request $request)
    {
        $biodata = BiodataPenandatangan::findOrFail($id);
        $biodata->update($request->all());

        return response()->json($biodata, 200);
    }
    
    public function delete($id)
    {
        BiodataPenandatangan::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }    
}
