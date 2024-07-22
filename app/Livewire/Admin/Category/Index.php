<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{

        use WithPagination;
        protected $paginationTheme = 'bootstrap';
        public $category;


    public function deleteCategory($category){
       
        $this->category=$category;
    }

      public function destroyCategory(){
        $category = Category::findOrFail($this->category);
        if(File::exists(public_path("storage/$category->image"))){
               File::delete(public_path("storage/$category->image"));
         }
         $category->delete();
         session()->flash('message', 'category deleted');
         // $this->dispatchBrowserEvent('close-modal');
    }

    public function render()

    {
       
        
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index',[
            'categories'=>$categories
        ]);
    }
}
