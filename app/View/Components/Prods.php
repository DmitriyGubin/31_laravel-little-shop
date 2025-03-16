<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class Prods extends Component
{
    /**
     * Create a new component instance.
     */
    private $per_page;//количество товаров на страеицу
    private $cur_page;//текущая страница

    public function __construct()
    {
        //
        $this->per_page = 3;
        if(isset($_GET['page']))
        {
            $this->cur_page = $_GET['page'];
        }
        else
        {
            $this->cur_page = 1;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // $prods = Product::all();
        $prods = Product::query() -> orderBy('id', 'desc') -> paginate($this->per_page);
        return view('components.prods', [
            'prods' => $prods,
            'cur_page' => $this->cur_page
        ]);
    }
}
