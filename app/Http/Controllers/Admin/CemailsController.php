<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cemail;

class CemailsController extends Controller
{
    
    public function index()
    {
        $cemails = Cemail::all();
        return view('admin.cemails.index',compact('cemails'));
    }
    public function create()
    {
        $cemails = Cemail::all();
        return view('admin.cemails.create',compact('cemails'));
    }

    public function store(Request $request)
    {
        $cemail = Cemail::create($request->all());
        return redirect()->route('admin.cemails.index');
    }

    public function show($id)
    {
        $cemails = Cemail::findOrFail($id);
        return view('admin.cemails.show',compact('cemails'));
    }

    public function edit($id)
    {
        $cemail = Cemail::findOrFail($id);
        return view('admin.cemails.edit',compact('cemail'));
    }

    public function update(Request $request, $id)
    {
        $cemail = Cemail::findOrFail($id);
        $cemail->update($request->all());
        return redirect()->route('admin.cemails.index');        
    }

    public function destroy($id)
    {
        $cemail = Cemail::findOrFail($id);
        $cemail->compids()->detach();
        $cemail->delete();
        return redirect()->route('admin.cemails.index');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Cemail::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function archives(){
        $cemails = Cemail::onlyTrashed()->get();
        return view('admin.cemails.trashed',compact('cemails'));
    }

    public function restore($id)
    {
        $cemail = Cemail::withTrashed()->find($id)->restore();
        return redirect ('admin/cemails');
    }

    public function permanentDelete($id)
    {
        $cemail = Cemail::withTrashed()->findOrFail($id)->forceDelete();
        // return $cemail;
        return redirect ('admin/archives');
    }

    public function viewArchive($id){
        $cemails = Cemail::withTrashed()->findOrFail($id);
        return view('admin.cemails.cemails_ar',compact('cemails'));
    }


}
