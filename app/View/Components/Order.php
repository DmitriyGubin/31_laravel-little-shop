<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Order_product;

class Order extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //все это для того что бы не было лишних запросов к базе данных
        $records = Order_product::with(['order', 'product'])->get();
        $orders = [];
        $price_total = 0;
        if(count($records) != 0)
        {
            /**********ищем заказы********/
            $ids = [];
            foreach ($records as $item) 
            {
                $order_id = $item['order_id'];
                if($order_id != null)
                {
                    $ids[] = $order_id;
                }
            }
            $ids = array_unique($ids);
            foreach ($ids as $id)
            {
                $flag_date = true;
                $names = '';
                $price = 0;
                foreach ($records as $row) 
                {
                    if($id == $row['order_id'])
                    {
                        if($flag_date)
                        {
                            $date = explode(' ',$row['order']['created_at'])[0];
                            $flag_date = false;
                        }
                        if($row['product'] != null)
                        {
                            $names .= $row['product']['name'].', ';
                            $price += $row['quant']*$row['product']['price'];
                        }
                    }
                }
                $names = substr($names, 0, strlen($names) - 2);
                $orders[] = [
                            'id' => $id,
                            'date' => $date,
                            'names' => $names,
                            'price' => $price
                        ];
                $price_total += $price;
            }
        }

        return view('components.order', [
            'orders' => $orders,
            'price_total' => $price_total
        ]);
    }
}
