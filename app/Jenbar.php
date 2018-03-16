<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenbar extends Model
{
    protected $fillable = ['id','namajenis'];
    protected $visible = ['id','namajenis'];
    public  $timestamps = true;
 	
 	public function barang(){
			return $this->hasMany('App\Barang');
	}
	
}
