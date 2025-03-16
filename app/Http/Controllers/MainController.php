<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function Catalog_Page() 
    {
        return view('main.catalog_page');
    }

    public function Make_Order_Page() 
    {
        return view('main.make_order_page');
    }

    public function Orders_Page() 
    {
        $chek_auth = Auth::check();
        return view('main.orders_page', ['auth' => $chek_auth]);
    }
}
