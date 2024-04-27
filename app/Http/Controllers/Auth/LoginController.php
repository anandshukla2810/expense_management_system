<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {
        $usertype = auth()->user()->usertype; 
        switch ($usertype) {
          case 'admin':
            return RouteServiceProvider::HOMEADMIN;
            break;
          case 'school_admin':
            return RouteServiceProvider::HOMESCHOOLADMIN;
            break;
          case 'teacher':
            return RouteServiceProvider::HOMETEACHER;
            break;
          case 'student':
            return RouteServiceProvider::HOMESTUDENT;
            break;

          default:
            return '/'; 
          break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
