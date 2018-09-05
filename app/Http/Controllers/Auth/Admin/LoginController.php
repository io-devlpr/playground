<?php

namespace App\Http\Controllers\Auth\Admin;

//use Illuminate\Http\Request;
use App\Http\Traits\Auth\AuthenticateAdmins;
use App\Http\Controllers\Auth\LoginController as Controller;

class LoginController extends Controller
{

    /*
     * This trait overloads those that were included in the LoginController
     * Created by Laravel's [ php artisan auth ] command
     */
    use AuthenticateAdmins;

    /**
     * Redirects Admin to the required page after logging in
     *
     * This must be included, of the redirectTo value set for the
     * users (The default LoginController) will take effect
     *
     * @var string
     */
    protected $redirectTo = "/dashboard";

    /**
     * LoginController constructor.
     *
     * Inherits the laravel LoginController
     */
    public function __construct()
    {
        parent::__construct();
    }
}
