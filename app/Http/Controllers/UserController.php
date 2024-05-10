<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->get();
        return view('inventaris.user.index', compact('user'));
    }

    public function myprofile()
    {
        $user = User::findOrFail(Auth::id());
        if(!$user) {
            return redirect()->back()->with('error', 'Profil pengguna tidak ditemukan.');
        }
        return view('inventaris.user.myprofile', compact('user'));
    }

    public function update(Request $request, $id)
{
    request()->validate([
        'name' => 'required|string|min:2|max:100',
        'email' => 'required|email|unique:users,email,' . $id . ',id',
    ]);

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->jenis_kelamin = $request->jenis_kelamin;
    $user->tanggal_lahir = $request->tanggal_lahir;
    $user->jabatan = $request->jabatan;
    $user->alamat = $request->alamat;
    $user->no_telepon = $request->no_telepon;

    if ($request->hasFile('foto')) {
        // Deleting the old file if it exists
        if ($user->foto && file_exists(public_path('foto/profile/' . $user->foto))) {
            unlink(public_path('foto/profile/' . $user->foto));
        }
    
        // Uploading and saving the new file
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
    
        $file->move(public_path('foto/profile'), $fileName);
        $user->foto = $fileName;
    }

    $user->save();
    Alert::success('Berhasil', 'Profile Berhasil Di ubah');
    return back()->with('status', 'Profile Telah Di Update!');
}

public function updatepassword(Request $request, $id)
{
    request()->validate([
        'old_password' => 'nullable',
        'password' => 'nullable|required_with:old_password|confirmed',
    ]);

    $user = User::find($id);

    if ($request->filled('old_password')) {
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        } else {
            return back()
                ->withErrors(['old_password' => __('Tolong Periksa Password')])
                ->withInput();
        }
    }
    Alert::success('Berhasil', 'Password Berhasil Di ubah');
    return back()->with('status', 'Password Telah Di Update!');
}
    
}
