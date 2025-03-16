<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Cookie;
use App\Models\Product;

class Basket extends Component
{
    private $prods = [];//товары в корзине
    private $total = 0;//стоимость всех товаров
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $all_prods = Product::all();
        foreach ($all_prods as $item) 
        {
            $quant = Cookie::get($item['id']);
            if($quant != '')
            {
                $item['quant'] = $quant;
                $this->prods[] = $item;
                $this->total += $item['price']*$quant;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.basket', [
            'prods' => $this->prods,
            'total' => $this->total
        ]);
    }
}
