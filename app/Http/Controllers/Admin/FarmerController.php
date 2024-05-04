<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FarmerController extends Controller
{
    public function index()
    {
        $farmers = User::where('role', 'farmer')->get();
        return view('admin.farmers.index', ['farmers' => $farmers]);
    }

    public function create()
    {
        return view('admin.farmers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required',
        ]);

        $farmer = new User;
        $farmer->role = 'farmer';
        $farmer->name = $request->name;
        $farmer->email = $request->email;
        $farmer->phone = $request->phone;
        $farmer->password = $request->password;
        $farmer->save();

        return redirect()->route('admin.farmers.index');
    }

    public function show($id)
    {
        $farmer = User::where('role', 'farmer')->findOrFail($id);

        return view('admin.farmers.show', ['farmer' => $farmer]);
    }

    public function edit($id)
    {
        $farmer = User::where('role', 'farmer')->findOrFail($id);

        return view('admin.farmers.edit', ['farmer' => $farmer]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric|unique:users,phone,' . $id,
        ]);

        $farmer = User::where('role', 'farmer')->findOrFail($id);

        $farmer->name = $request->name;
        $farmer->email = $request->email;
        $farmer->phone = $request->phone;

        if ($request->password) {
            $farmer->password = $request->password;
        }

        $farmer->update();

        return redirect()->route('admin.farmers.index');
    }

    public function destroy($id)
    {
        $farmer = User::where('role', 'farmer')->findOrFail($id);
        $farmer->delete();

        return redirect()->route('admin.farmers.index');
    }
}
