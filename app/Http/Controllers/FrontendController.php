<?php

namespace App\Http\Controllers;
use App\Models\GuidelinesPage;
use App\Models\Contact;
use App\Models\Package;
use App\Models\ContactPage;
use App\Models\HowItWorksPage;
use App\Models\PaymentMethodsPage;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        if ( Auth::check() ) {
            return view('admin.dashboard');
        } else {
            return view('welcome');
        }
    }
}
