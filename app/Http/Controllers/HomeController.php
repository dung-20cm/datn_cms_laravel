<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\Transaction;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome()
    {
        // thành viên mới
        $usersNew = User::orderByDesc('id')->limit(5)->get();

        // đơn hàng mới
        $transactionsNew = Transaction::orderByDesc('id')->limit(5)->get();

        // sản phẩm mới được mua

        $ordersNew = Order::with('product:id,pro_name,pro_avatar')->orderByDesc('id')->limit(10)->get();

        $viewData = [
            'usersNew'        => $usersNew,
            'transactionsNew' => $transactionsNew,
            'ordersNew'       => $ordersNew,
        ];

        return view('home.index', $viewData);
    }
}
