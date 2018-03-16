@extends('layouts.app')
@section('sidebar')
	<li class="header">MAIN NAVIGATION</li>
	<li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   
		<span>Dashboard</span></a></li>
	<li><a href="{{route('jenbar.index')}}"><i class="fa fa-circle-o text-green"></i>
		<span>Jenis Barang</span></a></li>

@endsection
@section('content')
<section class="content-header">
    <h1>
    	Data Jenis Barang
    </h1>
    <ol class="breadcrumb">
  		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   		<li class="active">Jenis Barang</li>
   	</ol>
</section><br><br><br>

<div class="box">
            <div class="box-header">
              <h3 class="box-title"><font color="black" >Data Jenis Barang</font></h3>
            </div><br>
            &nbsp&nbsp<a class="btn btn-primary" href="{{ route('jenbar.create') }}">Tambah</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-striped">
                <thead>
                <tr>
                  <th>No</th>
					        <th>Jenis Barang</th>
					        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
				@foreach($jenbar as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->namajenis}}</td>
					<td>
            <form action="{{route('jenbar.destroy',$data->id)}}" method="post">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a data-toggle="tooltip" data-placement="top" title="Edit Data jenbar" class="btn btn-warning" href="{{route ('jenbar.edit', $data->id) }}">Edit</a>
            <button data-toggle="tooltip" data-placement="top" title="Hapus Data jenbar" type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus ?')">Hapus</button>
            {{csrf_field()}}
          </form>
          </td>
				</tr>
				@endforeach
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@section('scripts')
<script type="text/javascript">
	$('#data').DataTable(); 
</script>
@endsection