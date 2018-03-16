<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    //
    protected $fillable = ['id','no_nota','total','tgl_pembelian','barang_id','pemasok_id'];
    protected $visible = ['id','no_nota','total','tgl_pembelian','barang_id','pemasok_id'];
    public function barang(){
			return $this->belongsTo('App\barang','barang_id');
	}
	public function pemasok(){
			return $this->belongsTo('App\pemasok','pemasok_id');
	}
}
