<?php

namespace App\Http\Controllers;
use App\Sertifikat;
use Illuminate\Http\Request;

class SertifikatController extends Controller
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
        return response()->json(Sertifikat::all());
    }

    public function show($id)
    {   
        $sertifikat = Sertifikat::find($id);
        return response()->json($sertifikat);
    }

    public function create(Request $request)
    {
        $sertifikat = Sertifikat::create($request->all());

        return response()->json($sertifikat, 201);
    }

    public function update($id, Request $request)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        $sertifikat->update($request->all());

        return response()->json($sertifikat, 200);
    }
    
    public function delete($id)
    {
        Sertifikat::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }    
}
