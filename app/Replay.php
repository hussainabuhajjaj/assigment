<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{


    protected $fillable = ['contact_id' , 'message'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
