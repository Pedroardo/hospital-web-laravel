<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Support\Facades\Storage;

class BookingTransaction extends Model
{
    //
    use softDeletes;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'started_at',
        'time_at',
        'status',
        'sub_total',
        'tax_total',
        'grand_total',
        'proof',
    ];

    protected $casts = [
        'started_at' => 'date',
        'time_at' => 'datetime:H:i',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function getProofAttributes($value){
        if(!$value){
            return null;
        }
        return url(Storage::url($value));
    }
}

