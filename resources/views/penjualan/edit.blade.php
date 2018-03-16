@extends('layouts.app')
@section('sidebar')
	<li class="header">MAIN NAVIGATION</li>
	<li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   
		<span>Dashboard</span></a></li>
	<li><a href="{{route('penjualan.index')}}"><i class="fa fa-circle-o text-green"></i>
		<span>penjualan</span></a></li>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Edit Data penjualan
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">penjualan</li><li class="active">Edit penjualan</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-primary">
			<div class="panel-heading" style="background: #9932cc">Edit penjualan
		</div>

		<div class="panel-body">
		<form action="{{route('penjualan.update',$penjualan->id)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
			<div class="form-group">
				<label class="control-lable">Barang</label>
				<select class="form-control" name="barang_id">
					@foreach($barang as $data)
					<option value="{{$data->id}}">{{$data->Merk}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label class="control-lable">Jumlah</label>
				<input type="number" name="jumlah" class="form-control" required="" value="{{$penjualan->jumlah}}">
			</div>
			<div class="form-group">
				<label class="control-lable">Tanggal Penjualan</label>
				<input type="date" name="tgl_penjualan" class="form-control" required="" value="{{$penjualan->tgl_penjualan}}">
			</div>
			<br>
			<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</div>
			</div>

		</form>
		</div>
	</div>
</div>
@endsection