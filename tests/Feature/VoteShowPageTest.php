<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeaShow;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class VoteShowPageTest extends TestCase
{
use RefreshDatabase;

    /** @test */
    public function show_page_contains_idea_show_livewire_component()
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

         $this->get(route('idea.show', $idea))->assertSeeLivewire('idea-show');

    }

    /** @test */
    public function show_page_correctly_receives_votes_count()
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

         $this->get(route('idea.show', $idea))->assertViewHas('votesCount',2);

    }

        /** @test */
        public function votes_count_shows_correctly_on_show_page_livewire_component()
        {

            $user = User::factory()->create();
            // $user2 = User::factory()->create();

            $categoryOne = Category::factory()->create(['name' => 'Category 1']);
            $statusOpen = Status::factory()->create(['name'=> 'Open', 'classes' =>'bg-gray-200']);

            $idea = Idea::factory()->create([
                'user_id' => $user->id,
                'category_id' => $categoryOne->id,
                'status_id' => $statusOpen->id,
                'title' => 'My First Idea',
                'description' => 'Description for my first idea'
            ]);
        Livewire::test(IdeaShow::class, [
            'idea' => $idea,
            'votesCount' => 5

        ])->assertSee('votesCount' , 5);

        }


        /** @test */
        public function user_who_is_logged_in_shows_voted_if_idea_is_alread_voted_for()
        {

            $user = User::factory()->create();
            // $user2 = User::factory()->create();

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
                'user_id'=>$user->id
            ]);

        Livewire::actingAs($user)->test(IdeaShow::class, [
            'idea' => $idea,
            'votesCount' => 5

        ])->assertSee('Voted');

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

            Livewire::test(IdeaShow::class,[
                'idea' => $idea,
                'votesCount' => 5,
            ])
            ->call('vote')
            ->assertRedirect(route('login'));


        }



                /** @test */
                public function an_authenticated_user_can_vote_for_an_idea()
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

                    // Vote::factory()->create([
                    //     'idea_id' => $idea->id,
                    //     'user_id' => $user->id

                    // ]);

                    $this->assertDatabaseMissing('votes',[
                        'user_id' => $user->id,
                        'idea_id' => $idea->id
                    ]);

                    Livewire::actingAs($user)->test(IdeaShow::class,[
                        'idea' => $idea,
                        'votesCount' => 5,
                    ])
                    ->call('vote')
                    ->assertSet('votesCount',6)
                    ->assertSet('hasVoted',true)
                    ->assertSee('Voted');


                $this->assertDatabaseHas('votes',[
                    'user_id' => $user->id,
                    'idea_id' => $idea->id
                ]);
                }

}
