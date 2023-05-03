<?php

namespace Tests\Unit;

use App\Models\BloodRequest;
use App\Models\BloodStore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_creation()
    {
        $user = User::factory()->create();

        $this->assertNotNull($user->name);
        $this->assertNotNull($user->email);
        $this->assertNotNull($user->password);
        $this->assertNotNull($user->type);
    }

    public function test_user_relationships()
    {
        $hospital = User::factory()->hospital()->create();
        $consumer = User::factory()->consumer()->create();

        $bloodStore = BloodStore::factory()->create([
            'hospital_id' => $hospital->id,
        ]);

        $bloodRequest = BloodRequest::factory()->create([
            'consumer_id' => $consumer->id,
            'hospital_id' => $hospital->id,
        ]);

        $this->assertTrue($hospital->blood_store->contains($bloodStore));
        $this->assertTrue($hospital->blood_requests->contains($bloodRequest));
        $this->assertTrue($consumer->blood_requests->contains($bloodRequest));
    }

    public function test_user_scopes()
    {
        $hospital = User::factory()->hospital()->create();
        $consumer = User::factory()->consumer()->create();

        $this->assertCount(1, User::hospital()->get());
        $this->assertCount(1, User::consumer()->get());
    }

    public function test_user_type_attributes()
    {
        $hospital = User::factory()->hospital()->create();
        $consumer = User::factory()->consumer()->create();

        $this->assertTrue($hospital->is_hospital);
        $this->assertFalse($hospital->is_consumer);
        $this->assertTrue($consumer->is_consumer);
        $this->assertFalse($consumer->is_hospital);
    }
}