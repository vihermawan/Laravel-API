<?php

namespace App\Http\Controllers;
use App\Event;
use App\DetailEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
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
        $event = Event::with(['infoevent'])->get();
        return response()->json($event);
    }

    public function show($id)
    {   
        $event = Event::with(['infoevent'])->find($id);
        return response()->json($event);
    }

    public function create(Request $request)
    {

        $detailevent = new DetailEvent;
        $detailevent->id_kategori = $request->id_kategori;
        $detailevent->deskripsi_event = $request->deskripsi_event;
        $detailevent->audien=$request->audien;
        $detailevent->open_regristation = $request->open_regristation;
        $detailevent->end_registration = $request->end_registration;
        $detailevent->time_start = $request->time_start;
        $detailevent->time_end = $request->time_end;
        $detailevent->limit_participant = $request->limit_participant;
        $detailevent->lokasi = $request->lokasi;
        $detailevent->venue = $request->venue;
        $detailevent->picture = $request->picture;
        $detailevent->video = $request->video;

        $detailevent->save();

        $e = DB::table('detail_event')->get();

        foreach($e as $data){
            $event = new Event;
            $event->id_detail_event = $data->id_detail_event;
        }
        $event->id_status = $request->id_status;
        $event->nama_event = $request->nama_event;
        $event->organisasi = $request->organisasi;

        $event->save();
        
        return response()->json([$detailevent,$event], 201);
    }

    public function update($id, Request $request)
    {
        $event = Event::findOrFail($id);
        $detailevent = DetailEvent::findOrFail($id);
        
        $event->update($request->all());
        $detailevent->update($request->all());
        return response()->json([$event,$detailevent], 200);
    }
    
    public function delete($id)
    {
        Event::findOrFail($id)->delete();
        DetailEvent::findorFail($id)->delete();
        return response('Deleted Successfully', 200);
    }    
}
