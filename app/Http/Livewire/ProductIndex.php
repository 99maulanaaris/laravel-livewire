<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    public function render()
    {
        return view('livewire.product-index',[
            'products'=> Product::paginate(8)
        ]);

    }
}
