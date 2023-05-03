<?php

namespace Tests\Unit;

use App\Models\BloodRequest;
use App\Models\BloodStore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BloodStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_blood_store_creation()
    {
        $hospital = User::factory()->hospital()->create();
        $bloodStore = BloodStore::factory()->make([
            'hospital_id' => $hospital->id,
        ]);

        $this->assertNotNull($bloodStore->hospital_id);
        $this->assertNotNull($bloodStore->blood_group);
        $this->assertNotNull($bloodStore->unit);
    }

    public function test_blood_store_relationships()
    {
        $bloodStore = BloodStore::factory()->create();
        $bloodRequest = BloodRequest::factory()->create([
            'hospital_id' => $bloodStore->hospital_id,
        ]);

        $this->assertTrue($bloodStore->blood_requests->contains($bloodRequest));
    }

    public function test_blood_store_available_scope()
    {
        $bloodStoreAvailable = BloodStore::factory()->create([
            'unit' => 5,
        ]);

        $bloodStoreNotAvailable = BloodStore::factory()->create([
            'unit' => 0,
        ]);

        $this->assertCount(1, BloodStore::available()->get());
        $this->assertTrue(BloodStore::available()->get()->contains($bloodStoreAvailable));
    }
}