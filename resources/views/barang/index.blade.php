@extends('layouts.app')
@section('sidebar')
	<li class="header">MAIN NAVIGATION</li>
	<li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   
		<span>Dashboard</span></a></li>
	<li><a href="{{route('barang.index')}}"><i class="fa fa-circle-o text-green"></i>
		<span>barang</span></a></li>

@endsection
@section('content')
<section class="content-header">
    <h1>
    	Data barang
    </h1>
    <ol class="breadcrumb">
  		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   		<li class="active">barang</li>
   	</ol>
</section><br><br><br>

<div class="box">
            <div class="box-header">
              <h3 class="box-title"><font color="black" >Data barang</font></h3>
            </div><br>
            &nbsp&nbsp<a class="btn btn-primary" href="{{ route('barang.create') }}">Tambah</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-striped">
                <thead>
                <tr>
                   <th>No</th>
					         <th>Nama barang</th>
                   <th>merk</th>
                   <th>stok</th>
                   <th>Jenis Barang</th>
                   <th>harga</th>
					         <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
				@foreach($barang as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->namabarang}}</td>
          <td>{{$data->Merk}}</td>
          <td>{{$data->jumlah}}</td>
          <td>{{$data->jenbar->namajenis}}</td>
          <td>{{$data->harga}}</td>
					<td>
            <form action="{{route('barang.destroy',$data->id)}}" method="post">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a data-toggle="tooltip" data-placement="top" title="Edit Data barang" class="btn btn-warning" href="{{route ('barang.edit', $data->id) }}">Edit</a>
            <button data-toggle="tooltip" data-placement="top" title="Hapus Data barang" type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus ?')">Hapus</button>
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