<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->email_verified) {
                return response()->json(['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'role' => $user->role,
                'message' => 'Login berhasil'], 200);
            } else {
                return response()->json(['bug' => 'email belum terferifikasi'], 200);
            }
        }

        return response()->json(['message' => 'Email atau kata sandi salah'], 401);
    }

    public function register(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->only('name', 'email', 'password'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
            // return response()->json(['error' => "validasi tidak memnuhi"], 200);
        }

        // $token = $user->createToken($request->name);
        // Buat pengguna baru
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        // $user->remember_token = $token->plainTextToken;
        $user->password = bcrypt($request->password);
        $user->save();

        // Otentikasi pengguna baru
        // Auth::login($user);
        // Redirect ke dashboard atau halaman setelah registrasi
        return response()->json(['email' => $user->email, 'role' => $user->role], 200);
    }
    public function all_user() {
        $students = User::where('role', 'user')
        ->select('id', 'name', 'email', 'email_verified', 'role')
        ->get();
        return response()->json(['students' => $students,'message' => 'berhasil menampilkan semua data user'], 200);
    }
    public function all() {
        $students = User::select('id', 'name', 'email', 'email_verified', 'role')
        ->get();
        return response()->json(['students' => $students,'message' => 'berhasil menampilkan semua data user'], 200);
    }
    public function verifyEmail(Request $request, $id)
    {
        $user_id = intval($id);
        $user = User::findOrFail($user_id);


        // Lakukan proses verifikasi email di sini
        $user->email_verified = 1;
        $user->save();

        // Tambahkan logika untuk pengiriman email verifikasi jika diperlukan

        return response()->json(['message' => 'Email berhasil diverifikasi'], 200);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}