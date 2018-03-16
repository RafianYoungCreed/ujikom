@extends('layouts.app')
@section('sidebar')
	<li class="header">MAIN NAVIGATION</li>
	<li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   
		<span>Dashboard</span></a></li>
	<li><a href="{{route('pemasok.index')}}"><i class="fa fa-circle-o text-green"></i>
		<span>Pemasok</span></a></li>

@endsection
@section('content')
<section class="content-header">
    <h1>
    	Data Pemasok
    </h1>
    <ol class="breadcrumb">
  		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   		<li class="active">Pemasok</li>
   	</ol>
</section><br><br><br>

<div class="box">
            <div class="box-header">
              <h3 class="box-title"><font color="black" >Data Pemasok</font></h3>
            </div><br>
            &nbsp&nbsp<a class="btn btn-primary" href="{{ route('pemasok.create') }}">Tambah</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-striped">
                <thead>
                <tr>
                   <th>No</th>
					         <th>Nama Pemasok</th>
                   <th>Alamat</th>
                   <th>Kota</th>
                   <th>Nomor Telpon</th>
                   <th>Nomor Pax</th>
					         <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
				@foreach($pemasok as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->namapemasok}}</td>
          <td>{{$data->alamat}}</td>
          <td>{{$data->kota}}</td>
          <td>{{$data->no_telp}}</td>
          <td>{{$data->no_pax}}</td>
					<td>
            <form action="{{route('pemasok.destroy',$data->id)}}" method="post">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a data-toggle="tooltip" data-placement="top" title="Edit Data pemasok" class="btn btn-warning" href="{{route ('pemasok.edit', $data->id) }}">Edit</a>
            <button data-toggle="tooltip" data-placement="top" title="Hapus Data pemasok" type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus ?')">Hapus</button>
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