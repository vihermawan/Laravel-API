<?php

namespace App\Http\Controllers;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
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
        return response()->json(Status::all());
    }

    public function show($id)
    {   
        $status = Status::find($id);
        return response()->json($status);
    }

    public function create(Request $request)
    {
        $status = Status::create($request->all());

        return response()->json($status, 201);
    }

    public function update($id, Request $request)
    {
        $status = Status::findOrFail($id);
        $status->update($request->all());

        return response()->json($status, 200);
    }
    
    public function delete($id)
    {
        Status::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }    
}
