<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
	use SoftDeletes;
	
	protected $fillable = ['client_name','client_email'];
	protected $dates = ['deleted_at'];

	protected static function boot() 
    {
      parent::boot();

      static::deleting(function($clients) {
         foreach ($clients->compids()->get() as $compid) {
            $compid->delete();
         }
      });
    }

    public function compids(){

        return $this->hasMany(Compid::class);
    }

    
}
