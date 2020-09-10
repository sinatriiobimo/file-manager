<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // public function index(Request $request) {
    //     $this->validate($request, [
    //         'limit' => 'integer',
    //         ]);
            
    //         $year = $request->get('year');
    //         $filename = $request->get('filename');
    //         $category = $request->get('category_id');
    //         if($filename || $year || $category) {
    //             $documents = Document::when($request->keyword, function ($query) use ($request) {
    //                 $query->where('filename', 'like', "%{$request->keyword}%")
    //                 ->orWhere('category_id', 'like', "%{$request->keyword}%")
    //                 ->orWhere('created_at', 'like', "%{$request->keyword}%");
    //             })->paginate($request->limit ? $request->limit : 5);
    //         } else {
    //             $documents = Document::orderBy('created_at')->paginate(5);
    //         }
            
    //         $documentByCategory = Document::all()->groupBy('category_id');
    //         $documents->appends($request->only('keyword', 'limit'));
            
    //         return view('pages.search.index', compact('documents', 'documentByCategory'));
            
        // }
        
        public function index(Request $request)
        {
                $year = $request->get('year');
                $filename = $request->get('filename');
                $category = $request->get('category_id');
                $documents = Document::all();
            
                if($filename || $year || $category) {
                        $documents = Document::where('filename', 'LIKE', "%$filename%")
                        ->where('category_id', 'LIKE', "%$category%")
                        ->where('created_at', 'LIKE', "%$year%")
                        ->get();
                    } else {
                            $documents = Document::all();
                        }
                    
                        $documentByCategory = Document::all()->groupBy('category_id');
                        return view('pages.search.index', compact('documents', 'documentByCategory'));
                    }
                    
                }
                