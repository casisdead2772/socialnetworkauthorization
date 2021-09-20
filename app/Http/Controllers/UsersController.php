<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use JsonException;

/**
 * Class UsersController
 * @package App\Http\Controllers
 * @mixin Eloquent\
 */
class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->paginate(15);
        $products = User::distinct()->get(['type']);
        $arraySocial = array();
        foreach($products as $product) {
            $socialCount = DB::table('users')
                ->where('type', $product->type)
                ->count();
            $social = $product->type;
            $arraySocial += [$social => $socialCount];
        }
        try {
            return view('users.index', ['users' => $users,'countUsers' => User::all()->count(), 'keysUsersSocial' => htmlspecialchars_decode(json_encode(array_keys($arraySocial))), 'valuesUsersSocial' => json_encode(array_values($arraySocial))]);
        } catch (JsonException $e) {

        }
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function deleteUser(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/');
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function blockUser(int $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Blocked';
        $user->save();
        return redirect('/');

    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function unblockUser(int $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Active';
        $user->save();
        return redirect('/');

    }
}
