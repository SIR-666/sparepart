<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Constants\Constants;
use Illuminate\Support\Facades\DB;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'noreg' => 'required',
            'password' => 'required'
        ]);

        // dd($request);

        $url = Constants::ApiPegawaiBaseUrl."/api/login";
        $dataPegawai = PostAPI($url,[],$credentials);

        // dd($dataPegawai);
        if ($dataPegawai == null) {
            return back()->withErrors([
                'email' => 'Your provided credentials do not match in our records.',
            ])->onlyInput('email');
        }

        if($dataPegawai["success"]);
        {
            //save token in session
            SaveSession('token',$dataPegawai["data"]["token"]);

            $url = Constants::ApiPegawaiBaseUrl."/api/pegawai/get-login-pegawai";
            $dataPegawai = GetAPI($url,GetHeaderAPIFromSession());

            //save token in sessio
            SaveSession('dataPegawai',$dataPegawai["data"]);

            //create if not exist
            $user = User::where('noreg',$request->noreg)->first();
            if (empty($user)) {
                $user =  User::create([
                    'name'              => $dataPegawai["data"]["nama"],
                    'email'             => $dataPegawai["data"]["email"],
                    'password'          => "no password",
                    'noreg'             => $dataPegawai["data"]["noreg"],
                    'role'              => 'user',
                    'atasan_user_id'    => '',
                ]);
            }

            $role = $user->role;
            $email = $user->email;
            SaveSession('user',$user);

            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/cs')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

    public function sso($tokenstring, Request $request)
    {
        $url = Constants::ApiPegawaiBaseUrl . "/api/pegawai/get-login-pegawai";
        $dataPegawai = GetAPI($url, [
            'Authorization' => "Bearer " . $tokenstring
        ]);

        if ($dataPegawai["success"]) {
            SaveSession('token',$tokenstring);
            SaveSession('dataPegawai', $dataPegawai["data"]);

            $user = User::where('noreg', $dataPegawai["data"]["noreg"])->first();
            if (empty($user)) {
                $user =  User::create([
                    'name'              => $dataPegawai["data"]["nama"],
                    'email'             => $dataPegawai["data"]["email"],
                    'password'          => "no password",
                    'noreg'             => $dataPegawai["data"]["noreg"],
                    'role'              => 'user',
                    'atasan_user_id'    => '0',
                ]);
            }
            SaveSession('user', $user);

            $approvals = DB::table("apps_approves")->where("apps_master_id","1")->get()->toArray();

            foreach ($approvals as $key => $d) {
                SaveSession($d->apps_approve_name,$d->user_id);
            }

            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/')->withSuccess('You have successfully logged in!');
        }

        return redirect('/');
    }

}
