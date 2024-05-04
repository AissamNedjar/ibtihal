<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role', 'client')->get();
        return view('admin.clients.index', ['clients' => $clients]);
    }

    public function create()
    {
        return view('client.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required',
        ]);

        $client = new User;
        $client->role = 'client';
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->password = $request->password;
        $client->save();

        return redirect()->route('client.clients.index');
    }

    public function show($id)
    {
        $client = User::where('role', 'client')->findOrFail($id);

        return view('client.clients.show', ['client' => $client]);
    }

    public function edit($id)
    {
        $client = User::where('role', 'client')->findOrFail($id);

        return view('client.clients.edit', ['client' => $client]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric|unique:users,phone,' . $id,
        ]);

        $client = User::where('role', 'client')->findOrFail($id);

        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;

        if ($request->password) {
            $client->password = $request->password;
        }

        $client->update();

        return redirect()->route('client.clients.index');
    }

    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->route('client.clients.index');
        }
        $client = User::where('role', 'client')->findOrFail($id);
        $client->delete();

        return redirect()->route('client.clients.index');
    }
}


