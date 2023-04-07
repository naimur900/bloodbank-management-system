<?php

namespace Database\Seeders;

use App\Models\BloodStore;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_store')->delete();
        $hospital_id = User::whereType(User::TYPE_HOSPITAL)->first()->id;
        BloodStore::create([
            'hospital_id' => $hospital_id,
            'blood_group' => 'A+',
            'unit' => 4

        ]);
        BloodStore::create([
            'hospital_id' => $hospital_id,
            'blood_group' => 'A-',
            'unit' => 4

        ]);
        BloodStore::create([
            'hospital_id' => $hospital_id,
            'blood_group' => 'B+',
            'unit' => 4

        ]);
        BloodStore::create([
            'hospital_id' => $hospital_id,
            'blood_group' => 'B-',
            'unit' => 4

        ]);
        BloodStore::create([
            'hospital_id' => $hospital_id,
            'blood_group' => 'AB+',
            'unit' => 4

        ]);
        BloodStore::create([
            'hospital_id' => $hospital_id,
            'blood_group' => 'AB-',
            'unit' => 4

        ]);
        BloodStore::create([
            'hospital_id' => $hospital_id,
            'blood_group' => 'O+',
            'unit' => 4

        ]);
        BloodStore::create([
            'hospital_id' => $hospital_id,
            'blood_group' => 'O-',
            'unit' => 4

        ]);
    }
}
