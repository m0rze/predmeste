<?php

namespace App\Http\Controllers;

use App\Models\Dude;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Root\User;

class LoginController extends Controller
{
    /**
     * @var User
     */
    private User $user;

    public function __construct(
        User $user
    )
    {
        $this->user = $user;
    }

    public function show()
    {
        Dude::truncate();
        setcookie("dude", "", time() + (86400 * 7), "/");
        return view("admin.auth.login");
    }

    public function login(Request $request)
    {
        if(empty($request->input("username")) || empty($request->input("password"))){
            return Redirect::back()->withErrors(['msg' => "Заполните все поля"]);
        }
        $faker = Factory::create();
        $session = $faker->regexify('[A-Za-z0-9]{50}');
        if(empty($session)){
            return Redirect::back()->withErrors(['msg' => "Попробуйте еще раз"]);
        }

        if(
            $request->input("username") !== $this->user->userName
            || $request->input("password") !== $this->user->password
        ) {
            return Redirect::back()->withErrors(['msg' => "Неверное имя или пароль"]);
        }
        setcookie("dude", $session, time() + (86400 * 7), "/");
        Dude::create([
            "session" => $session
        ]);
        return Redirect::route("admin.categories.index");
    }
}
