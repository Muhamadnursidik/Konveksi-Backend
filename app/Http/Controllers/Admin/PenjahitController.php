<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenjahitController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'penjahit')->get();
        return view('admin.users.penjahit.index', compact('users'));
    }

    public function create()
    {
        $users = User::where('role', 'penjahit')->get();
        return view('admin.users.penjahit.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'photo'    => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        $data['role'] = 'penjahit';

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('users', 'public');
        }

        User::create($data);

        return redirect()
            ->route('admin.penjahit.index')
            ->with('success', 'penjahit berhasil ditambahkan');
    }

    public function edit($id)
    {
        $users = User::where('role','penjahit')->findOrFail($id);
        return view('admin.users.penjahit.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('role','penjahit')->findOrFail($id);

        $data = $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'photo' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $data['photo'] = $request->file('photo')->store('users', 'public');
        }

        $user->update($data);

        return redirect()
            ->route('admin.penjahit.index')
            ->with('success', 'penjahit berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::where('role','penjahit')->findOrFail($id);

        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return back()->with('success', 'penjahit berhasil dihapus');
    }
}
