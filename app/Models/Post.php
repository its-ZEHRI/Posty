<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\like;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'user_id'
    ];
    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
        // contain is laravel collection method which allow to look inside of that collection
        // of object at a perticular key i.e user_id..
        // if it is in the likes.. it will return a true
    }
    public function ownedBy(User $user){
        return $user->id ===$this->user_id;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
