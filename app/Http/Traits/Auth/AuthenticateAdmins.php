<?php
/**
 * Created by PhpStorm.
 * User: iO
 * Date: 8/19/2018
 * Time: 4:48 PM
 */

namespace App\Http\Traits\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AuthenticateAdmins
{

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    // [Override]
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    /**
     * The admin has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('username', 'password');
    }

    /**
     * The admin has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard("admin");
    }

}