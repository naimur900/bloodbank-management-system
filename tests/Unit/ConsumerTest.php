<?php

namespace Tests\Feature;

use App\Models\BloodRequest;
use App\Models\BloodStore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsumerControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_hospital_index()
    {
        $consumer = User::factory()->consumer()->create();
        $hospital = User::factory()->hospital()->create();

        $response = $this->actingAs($consumer)->get('/consumer/hospitals');
        $response->assertStatus(200);
        $response->assertViewIs('consumer');
        $response->assertSeeText($hospital->name);
    }

    public function test_show_hospital()
    {
        $consumer = User::factory()->consumer()->create();
        $hospital = User::factory()->hospital()->create();
        BloodStore::factory()->create([
            'hospital_id' => $hospital->id,
            'blood_group' => $consumer->blood_group,
            'unit' => 10,
        ]);

        $response = $this->actingAs($consumer)->get("/consumer/hospitals/{$hospital->id}");
        $response->assertStatus(200);
        $response->assertViewIs('show-hospital');
        $response->assertSeeText($hospital->name);
    }

    public function test_send_request_success()
    {
        $consumer = User::factory()->consumer()->create();
        $hospital = User::factory()->hospital()->create();
        BloodStore::factory()->create([
            'hospital_id' => $hospital->id,
            'blood_group' => $consumer->blood_group,
            'unit' => 10,
        ]);

        $response = $this->actingAs($consumer)->post("/consumer/hospitals/{$hospital->id}/request", [
            'unit' => 5,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Request Generated');

        $bloodRequest = BloodRequest::where([
            'consumer_id' => $consumer->id,
            'hospital_id' => $hospital->id,
            'blood_group' => $consumer->blood_group,
            'unit' => 5,
        ])->first();

        $this->assertNotNull($bloodRequest);
    }

    public function test_send_request_insufficient_blood()
    {
        $consumer = User::factory()->consumer()->create();
        $hospital = User::factory()->hospital()->create();
        BloodStore::factory()->create([
            'hospital_id' => $hospital->id,
            'blood_group' => $consumer->blood_group,
            'unit' => 2,
        ]);

        $response = $this->actingAs($consumer)->post("/consumer/hospitals/{$hospital->id}/request", [
            'unit' => 5,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error', 'Insufficient Blood');
    }

    public function test_send_request_not_consumer()
    {
        $hospital1 = User::factory()->hospital()->create();
        $hospital2 = User::factory()->hospital()->create();
        BloodStore::factory()->create([
            'hospital_id' => $hospital2->id,
            'blood_group' => 'A+',
            'unit' => 10,
        ]);

        $response = $this->actingAs($hospital1)->post("/consumer/hospitals/{$hospital2->id}/request", [
            'unit' => 5,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error', 'Only Consumer can request for Blood ');

        $bloodRequest = BloodRequest::where([
            'consumer_id' => $hospital1->id,
            'hospital_id' => $hospital2->id,
            'blood_group' => 'A+',
            'unit' => 5,
        ])->first();

        $this->assertNull($bloodRequest);
    }
}