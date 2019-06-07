<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compid;
use App\Client;
use Illuminate\Support\Facades\Redirect;

class CompidsController extends Controller
{

    public function index()
    {
        $compids = Compid::all();
        return view('admin.compids.index',compact('compids'));
    }

    public function create()
    {
        return view('admin.compids.create');
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
        $clients =  Client::where('compid_id', $id)->get();

        return view('admin.compids.show',compact('compids','clients'));
    }

    public function edit($id)
    {
        $compid = Compid::findOrFail($id);

        return view('admin.compids.edit', compact('compid'));
    }

    public function update(Request $request, $id)
    {
        $compid = Compid::findOrFail($id);
        $compid->update($request->all());

        $clients           = $compid->clients;
        $currentClientData = [];
        foreach ($request->input('clients', []) as $index => $data) {
            if (is_integer($index)) {
                $compid->clients()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentClientData[$id] = $data;
            }
        }
        foreach ($clients as $item) {
            if (isset($currentClientData[$item->id])) {
                $item->update($currentClientData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.compids.index');
    }

    public function destroy($id)
    {
        $compid = Compid::findOrFail($id);
        $compid->delete();

        return redirect()->route('admin.compids.index');
    }

    public function gmail($id){

        $compid = Compid::findOrFail($id);

        $client = $compid->clients()->pluck('client_email');

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
