@extends('layouts.app')
@section('sidebar')
	<li class="header">MAIN NAVIGATION</li>
	<li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   
		<span>Dashboard</span></a></li>
	<li><a href="{{route('jenbar.index')}}"><i class="fa fa-circle-o text-green"></i>
		<span>Jenis Barang</span></a></li>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Edit Data Jenis Barang
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">jenis barang</li><li class="active">Edit jenis barang</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-primary">
			<div class="panel-heading" style="background: #9932cc">Edit jenis barang
		</div>

		<div class="panel-body">
		<form action="{{route('jenbar.update',$jenbar->id)}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			{{csrf_field()}}

			<div class="form-group{{ $errors->has('namajenis') ? ' has-error' : '' }}">
				<label class="control-lable">Jenis Barang</label>
				<input type="text" name="namajenis" class="form-control" value="{{$jenbar->namajenis}}">
				{!! $errors->first('namajenis', '<p class="help-block">:message</p>') !!}
			</div><br>
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