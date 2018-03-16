<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    //
    protected $fillable = ['id','no_nota','Merk','jumlah','total','tgl_penjualan','barang_id'];
    protected $visible = ['id','no_nota','Merk','jumlah','total','tgl_penjualan','barang_id'];
    public function barang(){
			return $this->belongsTo('App\barang','barang_id');
	}
}
