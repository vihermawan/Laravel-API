<?php

namespace App\Http\Controllers;
use App\PesertaEvent;
use App\Peserta;
use Illuminate\Http\Request;

class PesertaEventController extends Controller
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
        $peserta_event = PesertaEvent::with('peserta','event')->get();
        return response()->json(['Peserta', $peserta_event]);
    }
    public function show($id)
    {   
        $peserta_event = PesertaEvent::find($id);
        return response()->json($peserta_event);
    }

    public function create(Request $request)
    {
        $peserta_event = PesertaEvent::create($request->all());

        return response()->json($peserta_event, 201);
    }

    public function update($id, Request $request)
    {
        
    }
    
    public function delete($id)
    {
        PesertaEvent::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }    
}
