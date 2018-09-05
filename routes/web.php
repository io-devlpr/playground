<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Remember, in terms of hierarchy, the most specific routes,
 * need to be put on top, compare to the most general routes.
 *
 * Also, if two routes target the same area, the one below is the one considered
 */

// Setting the language to english forcefully :)
App::setLocale("en");


Route::domain("playground.test", "platform.playground.test")->group(function(){
    // Defining the paths for the routes

    Route::get("/", function (){
        return "Testing out events";
    });
    /*
     * Testing Events :: For Learning
     */
    Route::prefix("events")->group(function (){
        // Home page
        Route::get("/", function (){
            return "Testing out events";
        });
    });

    /*
     * These are the routes that are for the administrator interface.
     * Domain: platform.playground.test
     */
    Route::group(["domain" => "platform.playground.test"], function () {
        Route::name("platform.")->group(function (){
            /*
             * Platform Routes over here
             */
            Route::get("/", function (){
                echo "Determining the right page to redirect you to.";
            })->name("index");

            Route::get("/login", "Auth\Admin\LoginController@showLoginForm")->name("login");

            Route::middleware(['admin'])->group(function (){
                Route::get("/dashboard", function (){
                    echo "You are in the dashboard...";
                });
            });
        });

        /*
         * Those routes which don't need the 'platform.' prefix appended to the name
         */

        Route::get("/register", "Auth\Admin\RegisterController@showRegistrationForm");
        Route::post("/register", "Auth\Admin\RegisterController@register");

    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

});


Route::get("/", function (){
    return "If you can see this, its either targeting the API, or you haven't specified the index for this directory";
});