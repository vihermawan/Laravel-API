<?php

namespace App\Http\Controllers;
use App\Penandatangan;
use Illuminate\Http\Request;

class PenandatanganController extends Controller
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
        return response()->json(Penandatangan::all());
    }

    public function show($id)
    {   
        $penandatangan = Penandatangan::find($id);
        return response()->json($penandatangan);
    }

    public function create(Request $request)
    {
        $penandatangan = Penandatangan::create($request->all());

        return response()->json($penandatangan, 201);
    }

    public function update($id, Request $request)
    {
        $penandatangan = Penandatangan::findOrFail($id);
        $penandatangan->update($request->all());

        return response()->json($penandatangan, 200);
    }
    
    public function delete($id)
    {
        Penandatangan::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }    
}
