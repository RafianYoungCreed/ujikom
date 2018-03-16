<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemasok extends Model
{
    //
    protected $fillable = ['namapemasok','alamat','kota','no_telp','no_pax'];
    protected $visible = ['namapemasok','alamat','kota','no_telp','no_pax'];
    public function pembelian(){
			return $this->hasMany('App\pembelian','pemasok_id');
	}
}
