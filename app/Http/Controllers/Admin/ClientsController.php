<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Compid;
use Illuminate\Support\Facades\Redirect;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    public function create(){
        return view('admin.clients.create');

    }
    
    public function store(Request $request)
    {
        $clients = Client::create($request->all());

        foreach($request->input('compids', []) as $data){
            $clients->compids()->create($data);
        }

        return redirect()->route('admin.clients.index');
    }

    public function show($id)
    {
        $clients = Client::findOrFail($id);
        // $compid =  Compid::where('client_id', $id)->get();
        // return $clients->compids()->compid_name;
        return view('admin.clients.show',compact('clients'));
    }


    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $compids = Compid::get()->pluck('compid_name', 'id')
                        ->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.clients.edit', compact('client','compids'));
    }


    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());

        $compids           = $client->compids;
        $currentCompidData = [];
        foreach ($request->input('compids', []) as $index => $data) {
            if (is_integer($index)) {
                $client->compids()->create($data);
            } else {
                $id                     = explode('-', $index)[1];
                $currentCompidData[$id] = $data;
            }
        }
        foreach ($compids as $item) {
            if (isset($currentCompidData[$item->id])) {
                $item->update($currentCompidData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.clients.index');
    }

    public function destroy($id)
    {
        // $client = Client::findOrFail($id);
        // $compid_id = $client->compids()->where('client_id',$id)->pluck('id')->first();

        // $client->compids->find($compid_id)->compids()->detach();
        //$compid->find($id)->compids()->detach();

        // $compid = $client->compids()->delete();
        // $compid->where('client_id',$id)->compids()->detach();
        // return $compid_id;
        // $client->delete();

        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('admin.clients.index');
    }

    public function gmail($id){

        $client = Client::findOrFail($id);

        $cemails = $client->cemails()->pluck('client_email');

        $url = 'https://mail.google.com/mail/u/0/?view=cm&fs=1&to='.$cemails->implode(',');

        return Redirect::to($url);

    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Client::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}