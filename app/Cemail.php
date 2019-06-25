<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cemail extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['client_name','client_email'];
	protected $dates = ['deleted_at'];


    public function compids(){
        return $this->belongsToMany(Compid::class);
    }
}
