@extends('layouts.app')
@section('sidebar')
	<li class="header">MAIN NAVIGATION</li>
	<li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   
		<span>Dashboard</span></a></li>
	<li><a href="{{route('pembelian.index')}}"><i class="fa fa-circle-o text-green"></i>
		<span>pembelian</span></a></li>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Edit Data pembelian
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">pembelian</li><li class="active">Edit pembelian</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-primary">
			<div class="panel-heading" style="background: #9932cc">Edit pembelian
		</div>

		<div class="panel-body">
		<form action="{{route('pembelian.update',$pembelian->id)}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			{{csrf_field()}}
			
			<div class="form-group">
				<label class="control-lable">Barang</label>
				<select class="form-control" name="barang_id">
					@foreach($barang as $data)
					<option value="{{$data->id}}">{{$data->Merk}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label class="control-lable">pemasok</label>
				<select class="form-control" name="pemasok_id">
					@foreach($pemasok as $data)
					<option value="{{$data->id}}">{{$data->namapemasok}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label class="control-lable">Jumlah</label>
				<input type="number" name="jumlah" class="form-control" required="" value="{{$pembelian->jumlah}}">
			</div>
			<div class="form-group">
				<label class="control-lable">Tanggal pembelian</label>
				<input type="date" name="tgl_pembelian" class="form-control" required="" value="{{$pembelian->tgl_pembelian}}">
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