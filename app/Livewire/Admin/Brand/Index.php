<?php

namespace App\Livewire\Admin\Brand;

use Livewire\Component;
use App\Models\Brand;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{

use WithPagination;
        protected $paginationTheme = 'bootstrap';
        public $brand;


    public function deleteBrand($brand){
       
        $this->brand=$brand;
    }

      public function destroyBrand(){
        $brand = Brand::findOrFail($this->brand);
        if(File::exists(public_path("storage/$brand->image"))){
               File::delete(public_path("storage/$brand->image"));
         }
         $brand->delete();
         session()->flash('message', 'brand deleted');
         // $this->dispatchBrowserEvent('close-modal');
    }

    public function render()

    {
       
        
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index',[
            'brands'=>$brands
        ]);
    }
}
