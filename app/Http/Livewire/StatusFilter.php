<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class StatusFilter extends Component
{

    public $status = 'All';

    protected $queryString = ['status'];


    public function mount()
    {
        // $this->status = $newStatus;

        if(Route::currentRouteName() === 'idea.show'){
            $this->status = null;
            $this->queryString = [];
        }

    }

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;

        if($this->getPreviousRouteName() == 'idea.show'){

            return redirect(route('idea.index', ['status' => $this->status]));
        };

    }

    public function render()
    {
        return view('livewire.status-filter');
    }

    private function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }
}
