<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'users/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');     
        $url = str_replace(url('/'), '', url()->previous());
        if(\str_contains($url, 'books/detail')){
            $urlExplode = explode('/', $url);
            $bookSlug = array_pop($urlExplode);
            Session::put('bookSlug', $bookSlug);
        }
          
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $bookSlug = (Session::get('bookSlug'));

        if(isset($bookSlug)){
            Session::remove('bookSlug');
            return redirect(route('books.singleDetail', ['slug'=> $bookSlug]));
        }
        return redirect(route('users.dashboard'));
    }
}
