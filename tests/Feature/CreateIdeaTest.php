<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Http\Livewire\CreateIdea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function idea_form_does_not_show_when_logged_out()
    {
        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee("pls login in to add ideas");
        $response->assertDontSee("Please let us know what you will like to talk about", false);

    }


    /** @test */
    public function idea_form_shows_up_when_logged_in()
    {


        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertDontSee("pls login in to add ideas");
        $response->assertSee("Please let us know what you will like to talk about", false);

    }

    /** @test */
    public function main_page_contains_idea_create_livewire_component()
    {
        $response = $this->actingAs(User::factory()->create())
        ->get(route('idea.index'))
        ->assertSeeLivewire('create-idea');

    }

    /** @test */
    public function create_idea_form_validation_works()
    {
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title','')
            ->set('category','')
            ->set('description','')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category','description'])
            ->assertSee('The title field is required.')
            ;
    }

    /** @test */
    public function creating_an_idea_works_correctly()
    {
        $user = User::factory()->create();
        $categoryOne = Category::factory()->create(['name'=>'Category 1']);
        $categoryTwo = Category::factory()->create(['name'=>'Category 2']);
        $statusOpen = Status::factory()->create(['name'=> 'Open', 'classes'=>'bg-gray-200']);

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title','My First Idea' )
            ->set('category',$categoryOne->id)
            ->set('description','This is my first idea')
            ->call('createIdea')
            ->assertRedirect('/');

        $response = $this->actingAs($user)->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertSee('My First Idea');
        $response->assertSee('This is my first idea');

        $this->assertDatabaseHas('ideas',[
            'title'=>'My First Idea'
        ]);

    }

}
