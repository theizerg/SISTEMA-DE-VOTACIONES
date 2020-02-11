<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Redirect;

class UserController extends Controller
{

  




    public function index(Request $request)
    {
        

        /*************************************************** 
            Select para encriptar las contraseñas
        ****************************************************/
        /***************************************************
        $users = User::where(\DB::raw('id'), '>', 1)->get();
        
        foreach($users as $user)
        {
            $user->password = bcrypt($user->password);
            $user->save();
        }
        /***************************************************/
        
      
        
        $users = User::with('roles')->with('permissions')
                       ->search($request->q)
                       ->orderBy('status', 'asc')
                       ->get();
                      

        return view('admin.user.index', ['users' => $users]);
    }




    public function create()
    {
        return view('admin.user.create');
    }




    public function store(Request $request)
    {

        
        $user = User::create($request->except('role'));
        
        if ($request->has('role'))
        {
            $user->assignRole($request->role);
        }

       


        $notification = array(
            'message' => '¡Usuario Creado!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/user')->with($notification);
    }




    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user.show', ['user' => $user]);
    }




    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }




    public function update(Request $request, $id)
    
    {
     
        $user = User::find($id);
        $user->update($request->except('role'));

        if ($request->has('role'))
        {
            $user->syncRoles($request->role);
        }

        $notification = array(
            'message' => '¡Usuario Actualizado!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/user')->with($notification);
    }




    public function destroy($id)
    {
        $user = User::find($id)->delete();

        $notification = array(
            'message' => '¡Usuario Eliminado!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/user')->with($notification);
    }



    public function autocomplete(Request $request)
    {
        return User::search($request->q)->take(10)->get();
    }
}
