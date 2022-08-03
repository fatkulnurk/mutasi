<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return view('dashboard.admin.users.index');
    }

    public function create()
    {
        return view('dashboard.admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now()->toDateTimeString(),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard.admin.users.index')->with('success', 'Akun berhasil dibuat.');
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:190',
//            'phone_number' => 'required|string|min:9|max:190',
//            'address' => 'nullable|string|max:2000',
//            'gender' => 'nullable|string'
        ]);

//        User::whereId($id)->update($request->only(['name', 'phone_number', 'address', 'gender']));
        User::whereId($id)->update($request->only(['name']));

        return redirect()->route('dashboard.admin.users.index')
            ->with('success', 'Successfully updated users.');
    }

    public function editPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.admin.users.ubah-password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|max:190',
        ]);

        $user = User::whereId($id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('dashboard.admin.users.index')
            ->with('success', 'Successfully updated user password');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
