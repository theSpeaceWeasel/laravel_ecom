<?php

namespace App\Livewire\Admin\Slider;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class Index extends Component
{

        use WithPagination;
        // protected $paginationTheme = 'bootstrap';
        public $slider;


    public function deleteSlider($slider){
       
        $this->slider=$slider;
    }

      public function destroySlider(){
        $slider = Slider::findOrFail($this->slider);
        
         $slider->delete();
         session()->flash('message', 'slider deleted');
         // $this->dispatchBrowserEvent('close-modal');
    }

    public function render()

    {
        $sliders = Slider::all();
        return view('livewire.admin.slider.index',[
            'sliders'=>$sliders
        ]);
    }
}
