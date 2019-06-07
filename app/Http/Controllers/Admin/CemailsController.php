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


}
