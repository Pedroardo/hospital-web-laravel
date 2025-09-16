<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Hospital extends Model
{
    //
    use SoftDeletes;
    protected $fillable =[
        'name',
        'photo',
        'about',
        'address',
        'city',
        'post_code',
        'phone'
    ];

     public function doctors(){
        return $this->hasMany(Doctor::class);
    }

    public function specialist(){
        return $this->belongsToMany(Specialist::class, 'hospital_specialists');
    }

    public function getPhotoAttributes($value){
        if(!$value){
            return null;
        }
        return url(Storage::url($value));

    }
}
