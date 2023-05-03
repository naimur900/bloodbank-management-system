<?php

namespace Tests\Feature;

use App\Models\BloodRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_show_hospital()
    {
        $hospital = User::factory()->hospital()->create();

        $response = $this->actingAs($hospital)->get('/hospital/profile');
        $response->assertStatus(200);
        $response->assertViewIs('hospital.profile');
    }

    public function test_update_hospital()
    {
        $hospital = User::factory()->hospital()->create();

        $newData = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
        ];

        $response = $this->actingAs($hospital)->post('/hospital/update-profile', $newData);

        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Details Updated');

        $updatedHospital = $hospital->fresh();
        $this->assertEquals($newData['name'], $updatedHospital->name);
        $this->assertEquals($newData['description'], $updatedHospital->description);
        $this->assertEquals($newData['address'], $updatedHospital->address);
    }

    public function test_show_consumer()
    {
        $consumer = User::factory()->consumer()->create();

        $response = $this->actingAs($consumer)->get('/consumer/profile');
        $response->assertStatus(200);
        $response->assertViewIs('profile');
    }

    public function test_update_consumer()
    {
        $consumer = User::factory()->consumer()->create();

        $newData = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
        ];

        $response = $this->actingAs($consumer)->post('/consumer/update-profile', $newData);

        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Details Updated');

        $updatedConsumer = $consumer->fresh();
        $this->assertEquals($newData['name'], $updatedConsumer->name);
        $this->assertEquals($newData['description'], $updatedConsumer->description);
        $this->assertEquals($newData['address'], $updatedConsumer->address);
    }
}