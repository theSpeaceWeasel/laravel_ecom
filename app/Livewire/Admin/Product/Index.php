<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class Index extends Component
{

        use WithPagination;
        protected $paginationTheme = 'bootstrap';
        public $product;


    public function deleteProduct($product){
       
        $this->product=$product;
    }

      public function destroyProduct(){
        $product = Product::findOrFail($this->product);
     
        $images = $product->images;
        foreach($images as $image){
            if(File::exists(public_path("storage/$image->image"))){
               File::delete(public_path("storage/$image->image"));
         }
        }
        
         $product->delete();
         session()->flash('message', 'product deleted');
         // $this->dispatchBrowserEvent('close-modal');
    }

    public function render()

    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.product.index',[
            'products'=>$products
        ]);
    }
}
