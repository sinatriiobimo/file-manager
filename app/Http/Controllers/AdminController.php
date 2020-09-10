<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
 
    public function index()
    {
        return view('pages.admin.index');
    }

    public function user(Request $request)
    {
        $name = $request->get('name');
        $users = User::all();
        
        if($name) {
            $users = User::where('name', 'LIKE', "%$name%")->get();
        } else {
            $users = User::all();
        }
        return view('pages.admin.list', compact('users'));
    }

    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.update', compact('user'));
    }
        
   
    public function update(UserRequest $request, $id)
    {
        $usr = $request->all();
       
        $user = User::findOrFail($id);
        $user->update($usr);
        
        $request->session()->flash('updateUser', 'User was updated in File Manager!');
        return redirect()->route('admin.index');
    }

  
    public function destroy(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        $request->session()->flash('deleteUser', 'User was deleted in File Manager!');
        return Redirect::route('admin.index', compact('users'));
    }
}
