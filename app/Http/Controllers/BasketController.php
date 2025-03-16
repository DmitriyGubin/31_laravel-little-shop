<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Models\Product;

class BasketController extends Controller
{
    private $cookie_time = 24*60;//время жизни куки

    public function Add_To_Basket(Request $request) 
    {
        $quant = (int) ($request->quant);
        if($quant != 0)
        {
            $id = $request->prod_id;
            $quant_old = Cookie::get($id);
            if($quant_old == '')
            {
                $quant_new = $quant;
            }
            else
            {
                $quant_new = $quant_old + $quant;
            }
            Cookie::queue($id, $quant_new, $this->cookie_time);
        }
        // return redirect()->route('catalog');
        return redirect()->route('catalog',['page' => $request->cur_page]);
    }

    public function Delete_From_Basket(Request $request)
    {
        $id = $request->id_prod;
        Cookie::queue($id, '', 0);
        return redirect()->route('basket');
    }

    public function Clean_Basket()
    {
        $prods = Product::all();
        foreach ($prods as $item) 
        {
            $id = $item['id'];
            if(Cookie::get($id) != '')
            {
                Cookie::queue($id, '', 0);
            }
        }
    }
}
