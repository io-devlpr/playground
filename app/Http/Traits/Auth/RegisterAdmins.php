<?php
/**
 * Created by PhpStorm.
 * User: iO
 * Date: 8/19/2018
 * Time: 9:48 PM
 */

namespace App\Http\Traits\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

trait RegisterAdmins
{

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.admin.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        /*
         * TODO
         * ---------
         * Create and take care of the registered event on registration.
         *
         * Things I should do.
         * 1. Send email with details on
         *      - Device
         *      - Time
         *      - Location
         */
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard("admin");
    }

}