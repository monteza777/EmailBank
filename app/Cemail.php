<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cemail extends Model
{
    protected $fillable = ['client_name','client_email'];

    public function client(){

        return $this->belongsTo(Client::class);
    }
}