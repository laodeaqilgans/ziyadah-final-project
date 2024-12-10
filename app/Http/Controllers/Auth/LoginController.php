<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';  // Arahkan pengguna setelah login

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Setelah logout, arahkan pengguna ke halaman login.
     */
    protected function loggedOut(Request $request)
    {
        return redirect('/login');  // Arahkan pengguna ke halaman login setelah logout
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
