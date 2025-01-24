<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //

    // Whitelisting
    protected $fillable = ["title", "user_id"];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
