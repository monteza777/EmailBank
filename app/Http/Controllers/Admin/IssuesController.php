<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Issue;

class IssuesController extends Controller
{
    public function index()
    {
        $issues = Issue::all();
        return view('admin.issues.index',compact('issues'));
    }

    public function create()
    {
        $issues = Issue::all();
        return view('admin.issues.create',compact('issues'));
    }

    public function store(Request $request)
    {
        $issues = Issue::create($request->all());
        return redirect()->route('admin.issues.index');
    }

    public function show($id)
    {
        $issues = Issue::findOrFail($id);
        return view('admin.issues.show',compact('issues'));
    }

    public function edit($id)
    {
        $issues = Issue::findOrFail($id);
        return view('admin.issues.edit',compact('issues'));
    }

    public function update(Request $request, $id)
    {
        $issues = Issue::findOrFail($id);
        $issues->update($request->all());
        return redirect()->route('admin.issues.index');  
    }

    public function destroy($id)
    {
        $issues = Issue::findOrFail($id);
        $issues->delete();
        return redirect()->route('admin.issues.index');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Issue::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
