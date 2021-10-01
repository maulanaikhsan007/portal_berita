@extends('layouts.default')

@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h1 class="text-white pb-2 fw-bold">Materi</h1>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Data Materi</div>
                        <a href="{{ route('materi.create')}}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Tambah</a>
					</div>
				</div>
				<div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-primary">
                            {{Session('success')}}
                        </div> 
                    @endif
					<div class="table-responsive">
					    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Materi Video</th>
                                    <th>Slug</th>
                                    <th>Playlist</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($materi as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$data->judul_materi}}</td>
                                    <td>{{$data->slug}}</td>
                                    <td>{{$data->playlist->judul_playlist}}</td>
                                    <td>
                                        @if($data->is_active == '1')
                                            Active
                                        @else
                                            Draft
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $data->gambar_materi)}}" width="100">
                                    </td>
                                    <td>
                                        <a href="{{route('materi.edit', $data->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                        <a href="{{route('materi.destroy', $data->id)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection