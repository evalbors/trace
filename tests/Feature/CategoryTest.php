<?php

namespace Tests\Feature;

use App\Category;
use App\User;
use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_all_categories()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/areas');

        $response->assertStatus(200);
    }

    public function test_admin_can_create_category()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->post('/category', [
            'id' => 1,
            'name' => 'Neurology'
        ]);

        $this->assertDatabaseHas('categories', [
            'id' => 1,
            'name' => 'Neurology'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/areas');
    }

    public function test_admin_can_access_one_category()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $category = factory(Category::class)->create();

        $response = $this->get('/category/'.$category->id);

        $response->assertStatus(302);
    }

    public function test_admin_can_update_category()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $category = factory(Category::class)->create();

        $response = $this->actingAs($user)->patch('/category/' . $category->id);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/areas');
    }

    public function test_admin_can_delete_category()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $category = factory(Category::class)->create();

        $this->assertDatabaseHas('categories', ['id' => $category->id
        ]);

        $response = $this->actingAs($user)->delete('category/'. $category->id);

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/areas');
    }
}
