<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CreateIdea extends Component
{

    public $title;
    public $description;
    public $category=1;


    protected $rules = [
        'title' => 'required|min:4',
        'category' =>'required|integer|exists:categories,id',
        'description' => 'required|min:4',

    ];



    public function createIdea()
    {
        $this->validate();

        if( auth()->check()){

            Idea::create([
                'user_id' => auth()->id(),
                'category_id' => $this->category,
                'status_id' => 1,
                'title'=> $this->title,
                'slug' => Str::kebab($this->title),
                'description' => $this->description
            ]);

            session()->flash('success_message', 'Idea was added successfully');

            $this->reset();

            return redirect()->route('idea.index');
        }

        // abort(Response::HTTP_FORBIDDEN);
    }


    public function render()
    {
        return view('livewire.create-idea',['categories' => Category::all()]);
    }
}
