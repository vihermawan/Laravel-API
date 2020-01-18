<?php


namespace App\Http\Controllers;
use App\Users;
use App\UsersRole;
use App\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{    
    public function index(){
        $peserta = Peserta::get();
        $peserta->load('users_role.users');
        return response()->json(['Peserta', $peserta]);
    }

    //
    
    public function show($id)
    {
        $peserta = Peserta::find($id);
        $peserta->load('users_role.users');
        return response()->json(['Peserta', $peserta]);
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
            $peserta= new Peserta;
            $peserta->id_users_role = $users_role->id_users_role;
        }
        $peserta->nama_peserta = $request->nama_peserta;
        $peserta->tanggal_lahir = $request->tanggal_lahir;
        $peserta->umur = $request->umur;
        $peserta->organisasi = $request->organisasi;
        $peserta->foto_peserta = $request->foto_peserta;
        $peserta->save();

        return response()->json([$users,$peserta], 201);
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
        $peserta = Peserta::findOrFail($id);
        $users_role = UsersRole::findOrFail($peserta->id_users_role);
        $users = Users::findOrFail($users_role->id_users);
        
        $peserta->update($request->all());
        $users_role->update($request->all());
        $users->update($request->all());
        return response()->json([$users,$peserta,$users_role], 200);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    	Peserta::findOrFail($id)->delete();
        UsersRole::findorFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
    
}
