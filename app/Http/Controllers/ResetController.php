<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
    
        return view('pages.reset.index', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password']
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        $request->session()->flash('updatePassword', ' Your password was updated in File Manager!');
        return redirect()->back();
    }
}
