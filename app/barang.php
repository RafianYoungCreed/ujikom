<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    //

	protected $fillable = ['id','namabarang','Merk','ukuran','harga','jumlah','type','rasa','jenbar_id'];
    protected $visible = ['id','namabarang','Merk','ukuran','harga','jumlah','type','rasa','jenbar_id'];
    public  $timestamps = true;
 	
 	public function penjualan(){
			return $this->hasMany('App\penjualan');
	}
	public function pembelian(){
			return $this->hasMany('App\pembelian','barang_id');
	}
 	public function Jenbar(){
			return $this->belongsTo('App\Jenbar');
	}
	
}
