<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compid;
use App\Client;
use App\Cemail;
use Illuminate\Support\Facades\Redirect;

class CompidsController extends Controller
{

    public function index()
    {
        $compids = Compid::all();
        // $cemails = $compids->cemails()->get()->pluck('client_email', 'id')
        //                 ->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.compids.index',compact('compids'));

        // $compids = Compid::find(1)->cemails;
        // return $compids;

    }

    public function create()
    {
        $cemails = Compid::all();
        return view('admin.compids.create',compact('cemails'));
    }

    public function store(Request $request)
    {
        $compids = Compid::create($request->all());

        foreach($request->input('clients', []) as $data){
            $compids->clients()->create($data);
        }

        return redirect()->route('admin.compids.index');
    }

    public function show($id)
    {
        $compids = Compid::findOrFail($id);
        return view('admin.compids.show',compact('compids'));
    }

    public function edit($id)
    {
        $compid = Compid::findOrFail($id);
        // $emails = $compid->cemails()->get()->pluck('client_email', 'id')
        //                 ->prepend(trans('quickadmin.qa_please_select'), '');
                        
        $cemails = Cemail::get()->pluck('client_email', 'id')
                        ->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.compids.edit', compact('compid','emails','cemails'));
        
    }

    public function update(Request $request, $id)
    {
       $compid = Compid::findOrFail($id);
       $compid->compid_name = $request->compid_name;
       $compid->save();

       $client_email_id =  $request->input('cemails');
       $compid->cemails()->sync($client_email_id);

        return redirect()->route('admin.compids.index');
    }

    public function destroy($id)
    {
        $compid = Compid::findOrFail($id);
        $compid->cemails()->detach();
        $compid->delete();
        return redirect()->route('admin.compids.index');
    }

    public function gmail($id){

        $compid = Compid::findOrFail($id);

        $client = $compid->cemails()->pluck('client_email');

        $url = 'https://mail.google.com/mail/u/0/?view=cm&fs=1&to='.$client->implode(',');

        return Redirect::to($url);

    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Compid::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
