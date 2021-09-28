@extends('layouts.default')

@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h1 class="text-white pb-2 fw-bold">Artikel</h1>
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
						<div class="card-title">Edit Data Artikel</div>
                        <a href="/artikel" class="btn btn-warning btn-sm ml-auto"><i></i> Kembali</a>
					</div>
				</div>
				<div class="card-body">
                    <form method="post" action="{{route('artikel.update', $artikel->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label >Nama Artikel</label>
                            <input type="text" class="form-control" name="nama_kategori" value="{{$artikel->nama_kategori}}" placeholder="Masukkan Nama Kategori">
                        </div>
						<div class="form-group">
                            <label >Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" value="{{$artikel->slug}}" placeholder="Masukkan Nama Kategori">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ubah</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection