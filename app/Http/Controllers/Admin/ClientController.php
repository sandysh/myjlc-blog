<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->paginate();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = Str::slug($request->name,'-');
        $extension = $request->file('client_image')->getClientOriginalExtension();
        $fileName = $name.'.'.$extension;
        $path = Storage::disk('public')->putFileAs('clients/',$request->file('client_image'), $fileName);
        $request['image'] = "clients/$fileName";
        isset($request->active) && $request->active === 'on'
            ? $request['active'] = 1
            : $request['active'] = 0;
        Client::create($request->all());
        return redirect()->route('clients.index')->with('success','Client added !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Client $client, Request $request)
    {
        if ($request->has('client_image')) {
            Storage::disk('public')->delete($client->image);
            $name = Str::slug($request->name,'-');
            $extension = $request->file('client_image')->getClientOriginalExtension();
            $fileName = $name.'.'.$extension;
            $path = Storage::disk('public')->putFileAs('clients/',$request->file('client_image'), $fileName);
            $request['image'] = "clients/$fileName";
        }
        isset($request->active) && $request->active === 'on'
            ? $request['active'] = 1
            : $request['active'] = 0;
        $client->update($request->all());
        return redirect()->route('clients.index')->with('success','Client updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        Storage::disk('public')->delete($client->image);
        $client->delete();
        return redirect()->back()->with('success','Client Deleted');
    }
}
