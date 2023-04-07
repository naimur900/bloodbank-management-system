<?php

namespace Database\Seeders;

use App\Models\BloodRequest;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_requests')->delete();
        $hospital_id = User::whereType(User::TYPE_HOSPITAL)->first()->id;
        $consumer_id = User::whereType(User::TYPE_CONSUMER)->first()->id;

        BloodRequest::create([
            'consumer_id' => $consumer_id,
            'hospital_id' => $hospital_id,
            'blood_group' => 'A+',
            'unit' => 2,
            'status' => BloodRequest::STATUS_PENDING,
            'requested_at' => now()
        ]);

        BloodRequest::create([
            'consumer_id' => $consumer_id,
            'hospital_id' => $hospital_id,
            'blood_group' => 'B+',
            'unit' => 1,
            'status' => BloodRequest::STATUS_PENDING,
            'requested_at' => now()
        ]);

        BloodRequest::create([
            'consumer_id' => $consumer_id,
            'hospital_id' => $hospital_id,
            'blood_group' => 'O+',
            'unit' => 3,
            'status' => BloodRequest::STATUS_PENDING,
            'requested_at' => now()
        ]);
    }
}
