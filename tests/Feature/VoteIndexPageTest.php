<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeaIndex;
use App\Http\Livewire\IdeasIndex;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteIndexPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_page_contains_idea_index_livewire_component()
    {

        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $statusOpen = Status::factory()->create(['name'=> 'Open', 'classes' =>'bg-gray-200']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'title' => 'My First Idea',
            'description' => 'Description for my first idea'
        ]);

         $this->get(route('idea.index'))->assertSeeLivewire('idea-index');

    }

        /** @test */
        public function ideas_index_livewire_component_correctly_receives_votes_count()
        {

            $user = User::factory()->create();
            $user2 = User::factory()->create();

            $categoryOne = Category::factory()->create(['name' => 'Category 1']);
            $statusOpen = Status::factory()->create(['name'=> 'Open', 'classes' =>'bg-gray-200']);

            $idea = Idea::factory()->create([
                'user_id' => $user->id,
                'category_id' => $categoryOne->id,
                'status_id' => $statusOpen->id,
                'title' => 'My First Idea',
                'description' => 'Description for my first idea'
            ]);


            Vote::factory()->create([
                'idea_id' => $idea->id,
                'user_id' => $user->id
            ]);

            Vote::factory()->create([
                'idea_id' => $idea->id,
                'user_id' => $user2->id
            ]);


            Livewire::test(IdeasIndex::class)->assertViewHas('ideas', function($ideas){
                return $ideas->first()->votes_count ==2;
            });

            //  $this->get(route('idea.index'))->assertViewHas('ideas',function($ideas){

            //     return $ideas->first()->votes_count == 2;
            //  });

        }

        /** @test */
        public function a_guest_is_redirected_to_login_page_if_he_clicks_on_vote_button()
        {
            $user= User::factory()->create();
            $categoryOne = Category::factory()->create(['name'=> 'Category 1']);
            $statusOpen = Status::factory()->create(['name'=>'Open', 'classes' => 'bg-gray-200']);

            $idea = Idea::factory()->create([
                'user_id' => $user->id,
                'category_id' => $categoryOne->id,
                'status_id' => $statusOpen->id,
                'title' => 'My First Idea',
                'description' => 'Descrption of my first Idea'
            ]);

            Vote::factory()->create([
                'idea_id' => $idea->id,
                'user_id' => $user->id

            ]);

            Livewire::test(IdeaIndex::class,[
                'idea' => $idea,
                'votesCount' => 5,
            ])
            ->call('vote')
            ->assertRedirect(route('login'));


        }



                /** @test */
                public function a_user_who_is_logged_in_shows_voted_if_idea_is_already_voted_for()
                {
                    $user= User::factory()->create();

                    $categoryOne = Category::factory()->create(['name'=> 'Category 1']);
                    $statusOpen = Status::factory()->create(['name'=>'Open', 'classes' => 'bg-gray-200']);

                    $idea = Idea::factory()->create([
                        'user_id' => $user->id,
                        'category_id' => $categoryOne->id,
                        'status_id' => $statusOpen->id,
                        'title' => 'My First Idea',
                        'description' => 'Descrption of my first Idea'
                    ]);

                    Vote::factory()->create([
                        'idea_id' => $idea->id,
                        'user_id' => $user->id

                    ]);

                    $idea->votes_count =1;
                    $idea->voted_by_user =1;

                    Livewire::actingAs($user)->test(IdeaIndex::class,[
                        'idea' => $idea,
                        'votesCount' => 5,
                    ])
                    ->assertSet('hasVoted',true)->assertSee('voted');


                }


}
