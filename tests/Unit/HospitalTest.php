<?php

namespace Tests\Feature;

use App\Models\BloodRequest;
use App\Models\BloodStore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HospitalControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_dashboard()
    {
        $hospital = User::factory()->hospital()->create();

        $response = $this->actingAs($hospital)->get('/hospital/dashboard');
        $response->assertStatus(200);
        $response->assertViewIs('hospital.dashboard');
    }

    public function test_show_blood_requests()
    {
        $hospital = User::factory()->hospital()->create();

        $response = $this->actingAs($hospital)->get('/hospital/blood-requests');
        $response->assertStatus(200);
        $response->assertViewIs('hospital.blood-request');
    }

    public function test_show_available_blood()
    {
        $hospital = User::factory()->hospital()->create();

        $response = $this->actingAs($hospital)->get('/hospital/available-bloods');
        $response->assertStatus(200);
        $response->assertViewIs('hospital.available-bloods');
    }

    public function test_add_blood()
    {
        $hospital = User::factory()->hospital()->create();
        $bloodStore = BloodStore::factory()->create([
            'hospital_id' => $hospital->id,
            'blood_group' => 'A+',
            'unit' => 5,
        ]);

        $response = $this->actingAs($hospital)->post('/hospital/add-blood', [
            'blood_group' => 'A+',
            'unit' => 3,
        ]);

        $response->assertStatus(302);

        $updatedBloodStore = $hospital->blood_store->where('blood_group', 'A+')->first();
        $this->assertEquals(8, $updatedBloodStore->unit);
    }

    public function test_handle_blood_requests()
    {
        $hospital = User::factory()->hospital()->create();
        $consumer = User::factory()->consumer()->create();

        $bloodRequest = BloodRequest::factory()->create([
            'hospital_id' => $hospital->id,
            'consumer_id' => $consumer->id,
            'blood_group' => 'A+',
            'unit' => 3,
            'status' => BloodRequest::STATUS_PENDING,
        ]);

        $response = $this->actingAs($hospital)->post('/hospital/handle-blood-request', [
            'request_id' => $bloodRequest->id,
            'status' => 'approved',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Data Approved');

        $updatedBloodRequest = BloodRequest::find($bloodRequest->id);
        $this->assertEquals(BloodRequest::STATUS_ACCEPTED, $updatedBloodRequest->status);
    }
}