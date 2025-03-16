<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu as Menu_model;
use Illuminate\Http\Request;

class Menu extends Component
{
    /**
     * Create a new component instance.
     */
    private $cur_url;

    public function __construct(Request $request)
    {
        $path = $request->path();
        if($path == '/')
        {
            $this -> cur_url = $path;
        }
        else
        {
            $this -> cur_url = '/'.$path.'/';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = Menu_model::all();
        return view('components.menu', [
            'menu' => $menu,
            'cur_url' => $this -> cur_url
        ]);
    }
}
