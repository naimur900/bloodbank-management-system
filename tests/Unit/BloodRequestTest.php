<?php

namespace Tests\Unit;

use App\Models\BloodRequest;
use App\Models\BloodStore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BloodRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_blood_request_creation()
    {
        $consumer = User::factory()->consumer()->create();
        $hospital = User::factory()->hospital()->create();
        $bloodRequest = BloodRequest::factory()->make([
            'consumer_id' => $consumer->id,
            'hospital_id' => $hospital->id,
        ]);

        $this->assertNotNull($bloodRequest->consumer_id);
        $this->assertNotNull($bloodRequest->hospital_id);
        $this->assertNotNull($bloodRequest->blood_group);
        $this->assertNotNull($bloodRequest->unit);
        $this->assertEquals(BloodRequest::STATUS_PENDING, $bloodRequest->status);
    }

    public function test_blood_request_relationships()
    {
        $bloodRequest = BloodRequest::factory()->create();
        $bloodStore = BloodStore::factory()->create([
            'hospital_id' => $bloodRequest->hospital_id,
        ]);

        $bloodRequest->blood_store()->attach($bloodStore->id);

        $this->assertTrue($bloodRequest->blood_store->contains($bloodStore));
    }

    public function test_blood_request_scopes()
    {
        $pendingRequest = BloodRequest::factory()->create([
            'status' => BloodRequest::STATUS_PENDING,
        ]);

        $acceptedRequest = BloodRequest::factory()->create([
            'status' => BloodRequest::STATUS_ACCEPTED,
        ]);

        $this->assertCount(1, BloodRequest::pending()->get());
        $this->assertTrue(BloodRequest::pending()->get()->contains($pendingRequest));

        $this->assertCount(1, BloodRequest::accepted()->get());
        $this->assertTrue(BloodRequest::accepted()->get()->contains($acceptedRequest));
    }

    public function test_blood_request_status_attributes()
    {
        $bloodRequest = BloodRequest::factory()->create();

        $bloodRequest->status = BloodRequest::STATUS_PENDING;
        $this->assertTrue($bloodRequest->is_pending);

        $bloodRequest->status = BloodRequest::STATUS_ACCEPTED;
        $this->assertTrue($bloodRequest->is_accepted);

        $bloodRequest->status = BloodRequest::STATUS_DECLINED;
        $this->assertTrue($bloodRequest->is_declined);
    }
}