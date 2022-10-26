<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function list_of_ideas_shows_on_main_page()
    {

        $categoryOne = Category::factory()->create(['name'=> 'category 1']);
        $categoryTwo = Category::factory()->create(['name'=> 'category 2']);


        $statusOpen = Status::factory()->create(['name'=>'Open', 'classes' => 'bg-gray-200']);
        $statusConsidering = Status::factory()->create(['name'=>'Considering', 'classes' => 'bg-purple text-white']);

        //arrage
        $ideaOne = Idea::factory()->create([
            'title' => 'My First idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'first idea description'
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second idea',
            'category_id' => $categoryTwo->id,
            'status_id' => $statusConsidering->id,
            'description' => 'second idea description'
        ]);

        //act
            $response = $this->get(route('idea.index'));

        //assert
            $response->assertSuccessful();
            $response->assertSee($ideaOne->title);
            $response->assertSee($ideaOne->description);
            $response->assertSee($categoryOne->name);
            $response->assertSee('<button class="bg-gray-200 py-2 px-0 md:px-4 rounded-lg text-center font-bold uppercase leading-none w-28 h-7 text-xs ">Open</button>',false);
            $response->assertSee($categoryTwo->name);
            $response->assertSee($ideaTwo->title);
            $response->assertSee($ideaTwo->description);
            $response->assertSee('<button class="bg-gray-200 py-2 px-0 md:px-4 rounded-lg text-center font-bold uppercase leading-none w-28 h-7 text-xs ">Open</button>', false);
    }


    /** @test */
    public function a_single_idea_shows_correctly_on_the_show_page()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name'=> 'category 1']);

        $statusOpen = Status::factory()->create(['id'=>2, 'name'=>'Considering', 'classes' => 'bg-purple text-white']);
        // $statusConsidering = Status::factory()->create(['name'=>'Considering', 'classes' => 'bg-purple text-white']);


        $idea = Idea::factory()->create([
            'user_id'=>$user->id,
            'category_id' => $categoryOne->id,
            'title' => 'My first idea',
            'status_id' => $statusOpen->id,
            'description' => 'my first idea description'
        ]);

        //act
        $response = $this->get(route('idea.show', $idea));

        //assert

        $this->assertEquals('Considering', $idea->status->name);
        $this->assertEquals('bg-purple text-white', $idea->status->classes);

    }

    /** @test */
    public function idea_pagination_works()
    {
        $categoryOne = Category::factory()->create(['name'=>'Category 1']);
        $statusOpen = Status::factory()->create(['name'=>'Open', 'classes'=>'bg-gray-200']);

        Idea::factory(Idea::PAGINATION_COUNT+1)->create(
            [
                'category_id' =>$categoryOne->id,
                'status_id' => $statusOpen->id
            ]
        );

        $ideaOne =Idea::find(1);
        $ideaOne->title = 'check one idea';
        $ideaOne->save();

        $ideaEleven =Idea::find(11);
        $ideaEleven->title = 'check 11th idea';
        $ideaEleven->save();

        $response = $this->get('/');

        $response->assertSee($ideaEleven->title);
        $response->assertDontSee($ideaOne->title);

        $response = $this->get('/?page=2');

        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);
    }



}
