<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

/**
 * Class UloginController
 * @package App\Http\Controllers
 * @mixin Builder
 */

class UloginController extends Controller
{
    public function login(Request $request)
    {
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        dd($data);
        $user = json_decode($data, TRUE);
        $userData = User::where('email', $user['email'])->first();
        // Check exist user.
        if (isset($userData->id)) {
            if($userData->status === 'Blocked'){
                return redirect('/')->withErrors(['error']);
            }

            Auth::loginUsingId($userData->id, TRUE);

            return redirect('/');

        }

        else {

            $newUser = User::create([
                'name' => $user['first_name'] . ' ' . $user['last_name'],
                'email' => $user['email'],
                'password' => Hash::make(Str::random()),
                'type' => $user['network'],
                'status' => 'Active'
            ]);

            Auth::loginUsingId($newUser->id, TRUE);

            \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

            return redirect('/');
        }
    }
    //
}
