<?php


namespace App\Http\Controllers;
use App\Users;
use App\UsersRole;
use App\Panitia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanitiaController extends Controller
{    
    public function index(){
        $panitia = Panitia::get();
        $panitia->load('users_role.users');
        return response()->json(['Panitia', $panitia]);
    }

    //
    
    public function show($id)
    {
        $panitia = Panitia::find($id);
        $panitia->load('users_role.users');
        return response()->json(['Panitia', $panitia]);
    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $users = new Users;
		$users->email = $request->email;
		$users->password = $request->password;
        $users->save();


        $u = DB::table('users')->get();
        foreach($u as $users){
            $users_role= new UsersRole;
            $users_role->id_users = $users->id_users;
        }
        $users_role->id_role=3;
        $users_role->save();

        $ur = DB::table('users_role')->get();
        foreach($ur as $users_role){
            $panitia= new Panitia;
            $panitia->id_users_role = $users_role->id_users_role;
        }
        $panitia->nama_panitia = $request->nama_panitia;
        $panitia->organisasi = $request->organisasi;
        $panitia->foto_panitia = $request->foto_panitia;
        $panitia->save();

        return response()->json([$users,$panitia], 201);
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $panitia = Panitia::findOrFail($id);
        $users_role = UsersRole::findOrFail($panitia->id_users_role);
        $users = Users::findOrFail($users_role->id_users);
        
        $panitia->update($request->all());
        $users_role->update($request->all());
        $users->update($request->all());
        return response()->json([$users,$panitia,$users_role], 200);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    	Panitia::findOrFail($id)->delete();
        UsersRole::findorFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
    
}
