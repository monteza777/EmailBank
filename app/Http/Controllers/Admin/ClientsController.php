<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Cemail;
use Illuminate\Support\Facades\Redirect;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    public function show($id)
    {
        $clients = Client::findOrFail($id);
        $cemails =  Cemail::where('client_id', $id)->get();

        return view('admin.clients.show',compact('clients','cemails'));
    }


    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('admin.clients.edit', compact('client'));
    }


    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());

        $cemails           = $client->cemails;
        $currentCemailData = [];
        foreach ($request->input('cemails', []) as $index => $data) {
            if (is_integer($index)) {
                $client->cemails()->create($data);
            } else {
                $id                     = explode('-', $index)[1];
                $currentCemailData[$id] = $data;
            }
        }
        foreach ($cemails as $item) {
            if (isset($currentCemailData[$item->id])) {
                $item->update($currentCemailData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.clients.index');
    }

    public function destroy($id)
    {
        $compid = Client::findOrFail($id);
        $compid->delete();

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