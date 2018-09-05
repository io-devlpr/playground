<?php
/**
 * Created by PhpStorm.
 * User: iO
 * Date: 8/19/2018
 * Time: 9:46 PM
 */

namespace App\Http\Controllers\Auth\Admin;

use App\Admin;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\Auth\RegisterAdmins;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\RegisterController as Controller;

class RegisterController extends Controller
{

    use RegisterAdmins;

    protected $redirectTo = "/dashboard";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // [Override]
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|min:3',
            'username' => 'required|string|max:255|min:8',
            'dob' => [
              'required', 'string', 'max:255', 'date', 'before:today'
            ],
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Admin
     */
    // [Override]
    protected function create(array $data)
    {
        // Create the user instance
        $admin = Admin::create([
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'lang' => 'en'
                ]);

        $id = $admin->id;


        // Split the name
        $name = explode(" ", $data['name']);
        DB::table("admins_details")->insert([
            "fname" => $name[0],
            "lname" => $name[count($name) - 1],
            "dob" => $data["dob"],
            "admin_id" => $id
        ]);

        return $admin;
    }
}