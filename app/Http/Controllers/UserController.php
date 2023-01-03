<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereRaw(1);

        $users = $users->orderByDesc('id')->paginate(10);
        $viewData = [
            'users'   => $users,
            'query'      => $request->query()
        ];

        return view('user.index', $viewData);
    }

    public function delete($id)
    {
        $user =  User::find($id);
        if ($user)  $user->delete();
        return redirect()->back();
    }
}
