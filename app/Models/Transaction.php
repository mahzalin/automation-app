<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sender_id',
        'receiver_id',
        'amount',
        'status',
    ];

    const TRX_REJECTED = 'REJECTED';
    const TRX_PENDING = 'PENDING';
    const TRX_CONFIRM = 'CONFIRM';
    const TRX_DONE = 'DONE';

    public static $statusMap = [
        -1 => self::TRX_REJECTED,
        0 => self::TRX_PENDING,
        1 => self::TRX_CONFIRM,
        2 => self::TRX_DONE,
    ];

    public static function getStatusIdByName($name)
    {
        return Arr::get(array_flip(self::$statusMap), $name, $name);
    }

    public function getStatusAttribute()
    {
        return Arr::get(self::$statusMap, $this->attributes['status'], self::TRX_PENDING);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = self::getStatusIdByName($value);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
