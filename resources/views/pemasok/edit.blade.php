@extends('layouts.app')
@section('sidebar')
	<li class="header">MAIN NAVIGATION</li>
	<li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   
		<span>Dashboard</span></a></li>
	<li><a href="{{route('pemasok.index')}}"><i class="fa fa-circle-o text-green"></i>
		<span>Pemasok</span></a></li>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Edit Data Pemasok
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Pemasok</li><li class="active">Edit Pemasok</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-primary">
			<div class="panel-heading" style="background: #9932cc">Edit Pemasok
		</div>

		<div class="panel-body">
		<form action="{{route('pemasok.update',$pemasok->id)}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			{{csrf_field()}}

			<div class="form-group{{ $errors->has('namapemasok') ? ' has-error' : '' }}">
				<label class="control-lable">Nama Pemasok</label>
				<input type="text" name="namapemasok" class="form-control" value="{{$pemasok->namapemasok}}">
				{!! $errors->first('namapemasok', '<p class="help-block">:message</p>') !!}
			</div><br>

			<div class="form-group">
				<label class="control-lable">Alamat</label>
				<textarea class="form-control" name="alamat">{{$pemasok->alamat}}</textarea>
			</div>

			<div class="form-group">
				<label class="control-lable">Kota</label>
				<input type="text" name="kota" class="form-control" required="" value="{{$pemasok->kota}}">
			</div>

			<div class="form-group">
				<label class="control-lable">No Telpon</label>
				<input type="number" name="no_telp" class="form-control" required="" value="{{$pemasok->no_telp}}">
			</div>

			<div class="form-group">
				<label class="control-lable">No Pax</label>
				<input type="number" name="no_pax" class="form-control" required="" value="{{$pemasok->no_pax}}">
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