@extends('layouts.app')
@section('sidebar')
	<li class="header">MAIN NAVIGATION</li>
	<li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   
		<span>Dashboard</span></a></li>
	<li><a href="{{route('user.index')}}"><i class="fa fa-circle-o text-green"></i>
		<span>Karyawan</span></a></li>

@endsection
@section('content')
<section class="content-header">
    <h1>
    	Data Karyawan
    </h1>
    <ol class="breadcrumb">
  		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   		<li class="active">Karyawan</li>
   	</ol>
</section><br><br><br>

<div class="box">
            <div class="box-header">
              <h3 class="box-title"><font color="black" >Data Karyawan</font></h3>
            </div><br>
            &nbsp&nbsp<a class="btn btn-primary" href="{{ route('user.create') }}">Tambah</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-striped">
                <thead>
                <tr>
                   <th>NO</th>
                   <th>nama</th>
                   <th>email</th>
                   <th>password</th>
					         <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
				@foreach($user as $data)
				<tr>
          <td>{{$no++}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->email}}</td>
          <td>{{$data->password}}</td>
          <td>
            <form action="{{route('user.destroy',$data->id)}}" method="post">
            <input type="hidden" name="_method" value="Delete">
            <button data-toggle="tooltip" data-placement="top" title="Hapus Data Karyawan" type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus ?')">Hapus</button>
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