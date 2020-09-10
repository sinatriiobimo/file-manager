<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $documents = Document::all()->groupBy('category_id');
        $users = Auth::user()->count();
        $files = Document::all()->count();
        return view('dashboard', compact('documents', 'users', 'files'));
    }
}
