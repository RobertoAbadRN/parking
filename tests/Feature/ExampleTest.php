<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyControllerTest extends TestCase
{
    use RefreshDatabase;  // Esto es para asegurar una base de datos limpia antes de cada prueba

    /**
     * Test accessing the properties page.
     *
     * @return void
     */
    public function test_access_properties_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/properties');

        $response->assertStatus(200);
    }

    /**
     * Test creating a property.
     *
     * @return void
     */
    public function test_create_property()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'area' => 'Area Test',
            'name' => 'Name Test',
            // ... otros campos
        ];

        $response = $this->post('/properties', $data);

        $response->assertRedirect('/properties');
        $this->assertDatabaseHas('properties', $data);
    }

    /**
     * Test updating a property.
     *
     * @return void
     */
    public function test_update_property()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $property = Property::factory()->create();

        $data = [
            'area' => 'Updated Area',
            'name' => 'Updated Name',
            // ... otros campos
        ];

        $response = $this->put("/properties/{$property->id}", $data);

        $response->assertRedirect("/properties/{$property->id}");
        $this->assertDatabaseHas('properties', $data);
    }

    /**
     * Test deleting a property.
     *
     * @return void
     */
    public function test_delete_property()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $property = Property::factory()->create();

        $response = $this->delete("/properties/{$property->id}");

        $response->assertRedirect('/properties');
        $this->assertDatabaseMissing('properties', ['id' => $property->id]);
    }
}
