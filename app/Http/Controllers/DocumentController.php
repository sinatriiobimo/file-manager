<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\DocumentRequest;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Comment\Doc;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $documents = Document::orderBy('created_at')->paginate(3);
        $categories = Category::all();
        return view('pages.document.index', compact('documents', 'categories'));
    }

    public function store(DocumentRequest $request)
    {
        $docs = $request->all();
        $docs['slug'] = Str::slug($request->filename);
        $docs['file'] = $request->file('file')->store(
            'assets', 'public'
        );
        $docs['user_id'] = auth()->id();


        $request->session()->flash('status', 'File was stored in File Manager!');
        auth()->user()->documents()->create($docs);
        return redirect()->route('search');
    }

    
    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('pages.document.show', compact('document'));
    }


    public function destroy(Request $request, $id)
    {
        $documents = Document::findOrFail($id);
        $documents->delete();

        $request->session()->flash('delete', 'File was deleted in File Manager!');

        return redirect()->back();
    }

    public function download(Request $request, $id) 
    {
       $documents = Document::findOrFail($id);
       $file = Storage::url(basename($documents->file));
       $subsFile = Str::substr($file, 9);
       $pathFile = public_path('storage/assets/'.$subsFile);
       $prettyName = $documents['filename'];
       $prettyExtension = $documents->category['category'];
       
       return response()->download($pathFile, $prettyName . '.' . $prettyExtension);
       
       $request->session()->flash('download', 'File was downloaded in File Manager!');
    }
    
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        $categories = Category::all();
        return view('pages.document.update', compact('document', 'categories'));
    }

    public function update(DocumentRequest $request, $id)
    {
        $docs = $request->all();
        $docs['file'] = $request->file('file')->store(
            'assets', 'public'
        );
        $request->session()->flash('update', 'File was updated in File Manager!');
        $document = Document::findOrFail($id);
        $document->update($docs);

        return redirect()->route('search');
    }

}
