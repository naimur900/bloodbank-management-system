<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'contact_number',
        'address',
        'description',
        'blood_group',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    const TYPE_CONSUMER = 1;

    const TYPE_HOSPITAL = 2;

    public function blood_store()
    {
        return $this->hasMany(BloodStore::class, 'hospital_id', 'id');
    }

    public function blood_requests()
    {
        if ($this->type == self::TYPE_HOSPITAL) {
            return $this->hasMany(BloodRequest::class, 'hospital_id', 'id');
        }
        return $this->hasMany(BloodRequest::class, 'consumer_id', 'id');
    }

    public function getIsConsumerAttribute()
    {
        return $this->type === self::TYPE_CONSUMER;
    }

    public function getIsHospitalAttribute()
    {
        return $this->type === self::TYPE_HOSPITAL;
    }

    public function scopeHospital($query)
    {
        return $query->whereType(self::TYPE_HOSPITAL);
    }

    public function scopeConsumer($query)
    {
        return $query->whereType(self::TYPE_CONSUMER);
    }
    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $bloodGroups = [
                'A+',
                'A-',
                'B+',
                'B-',
                'AB+',
                'AB-',
                'O+',
                'O-',
            ];
            foreach ($bloodGroups as $blood_group) {
                BloodStore::create([
                    'hospital_id' => $model->id,
                    'blood_group' => $blood_group,
                    'unit' => rand(0, 5)
                ]);
            }
        });
    }
}
