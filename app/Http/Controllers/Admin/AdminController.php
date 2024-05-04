<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.admins.index', ['admins' => $admins]);
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required',
        ]);

        $admin = new User;
        $admin->role = 'admin';
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = $request->password;
        $admin->save();

        return redirect()->route('admin.admins.index');
    }

    public function show($id)
    {
        $admin = User::where('role', 'admin')->findOrFail($id);

        return view('admin.admins.show', ['admin' => $admin]);
    }

    public function edit($id)
    {
        $admin = User::where('role', 'admin')->findOrFail($id);

        return view('admin.admins.edit', ['admin' => $admin]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric|unique:users,phone,' . $id,
        ]);

        $admin = User::where('role', 'admin')->findOrFail($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;

        if ($request->password) {
            $admin->password = $request->password;
        }

        $admin->update();

        return redirect()->route('admin.admins.index');
    }

    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->route('admin.admins.index');
        }
        $admin = User::where('role', 'admin')->findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.admins.index');
    }
}
