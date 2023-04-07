<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodStore extends Model
{
    use HasFactory;
    protected $table = 'blood_store';

    protected $fillable = [
        'hospital_id',
        'blood_group',
        'unit'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function blood_requests()
    {
        return $this->hasMany(BloodRequest::class);
    }
    public function scopeAvailable($query)
    {
        return $query->where('unit', '>', 0);
    }
}
