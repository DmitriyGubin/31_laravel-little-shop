<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Product;
use App\Http\Controllers\BasketController;
use Cookie;

class OrderController extends Controller
{
    public function Add_Order()
    {
    	// добавление заказа
    	$order = new Order;
    	$order->save();
    	$id_order = $order->id;

    	// заполнение таблицы связи
    	$all_prods = Product::all();
    	$basket_prods = [];
        foreach ($all_prods as $item) 
        {
            $id = $item['id'];
            $quant = Cookie::get($id);
            if($quant != '')
            {
                $basket_prods[] = [ 'order_id' => $id_order,
                					'product_id' => $id,
                					'quant' => $quant
	                              ];
            }
        }
        Order_product::insert($basket_prods);

    	//чистка корзины
    	$basket_obj = new BasketController;
    	$basket_obj -> Clean_Basket();

    	return redirect()->route('basket',['add_order' => 'yes']);
    }

    public function Delete_Order(Request $request)
    {
        $id = $request->order_id;
        Order_product::where('order_id', $id)->delete();
        Order::where('id', $id)->delete();
        return redirect()->route('orders');
    }
}
