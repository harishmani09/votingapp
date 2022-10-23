<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function list_of_ideas_shows_on_main_page()
    {
        //arrage
        $ideaOne = Idea::factory()->create([
            'title' => 'My First idea',
            'description' => 'first idea description'
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second idea',
            'description' => 'second idea description'
        ]);

        //act
            $response = $this->get(route('idea.index'));

        //assert
            $response->assertSuccessful();
            $response->assertSee($ideaOne->title);
            $response->assertSee($ideaOne->description);
            $response->assertSee($ideaTwo->title);
            $response->assertSee($ideaTwo->description);
    }


    /** @test */
    public function a_single_idea_shows_correctly_on_the_show_page()
    {
        $idea = Idea::factory()->create([
            'title' => 'My first idea title',
            'description' => 'my first idea description'
        ]);

        //act
        $response = $this->get(route('idea.show', $idea));

        //assert

        $response->assertSee($idea->title);

    }

    /** @test */
    public function idea_pagination_works()
    {
        Idea::factory(Idea::PAGINATION_COUNT+1)->create();

        $ideaOne =Idea::find(1);
        $ideaOne->title = 'check one idea';
        $ideaOne->save();

        $ideaEleven =Idea::find(11);
        $ideaEleven->title = 'check 11th idea';
        $ideaEleven->save();

        $response = $this->get('/');

        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);

        $response = $this->get('/?page=2');

        $response->assertSee($ideaEleven->title);
        $response->assertDontSee($ideaOne->title);
    }

}
