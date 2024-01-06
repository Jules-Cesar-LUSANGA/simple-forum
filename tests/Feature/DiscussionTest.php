<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DiscussionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_display_discussions_page(): void
    {
        $user = User::factory(['password' => 'test'])->create();
        $response = $this->actingAs($user)->get('/discussions');
        $response->assertSee('All discussions');

        $response->assertStatus(200);
    }
    public function test_can_create_a_discussion() : void
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        $data = [
            'category_id' => $category->id,
            'title'       => fake()->words(4, true),
            'content'     => fake()->sentences(3, true) 
        ];

        $response = $this->actingAs($user)->post(route('discussions.store'), $data);

        $response->assertSessionHas('success');
    }
    public function test_can_show_a_discussion() : void
    {
        $user = User::factory()->create();

        $discussion = Discussion::factory()->create();

        $response = $this->actingAs($user)->get(route('discussions.show', $discussion->id));

        $response->assertOk();
    }

    public function test_can_delete_a_discussion() : void
    {
        $user = User::factory()->create();

        $discussion = Discussion::factory()->create();

        $response = $this->actingAs($user)->get(route('discussions.destroy', $discussion->id));

        $response->assertOk();
    }
    /*public function test_can_update_a_discussion() : void
    {
        $user = User::factory()->create();

        $discussion = Discussion::factory()->create();

        $category = Category::factory()->create();

        $data = [
            'category_id' => $category->id,
            'title'       => fake()->words(4, true),
            'content'     => fake()->sentences(3, true) 
        ];

        $response = $this->actingAs($user)->post(route('discussions.update', $discussion->id), $data);

        $response->assertSessionHas('success');
    }*/
}
