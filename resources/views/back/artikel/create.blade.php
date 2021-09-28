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
						<div class="card-title">Tambah Data Artikel</div>
                        <a href="/artikel" class="btn btn-warning btn-sm ml-auto"><i></i> Kembali</a>
					</div>
				</div>
				<div class="card-body">
                    <form method="post" action="{{route('artikel.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label >Judul Artikel</label>
                            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Artikel">
                        </div>
						<div class="form-group">
                            <label >Body</label>
                            <textarea name="body" class="form-control"> </textarea>
                        </div>
						<div class="form-group">
                            <label >Kategori</label>
                            <select name="kategori_id" class="form-control">
								<option value="">--Pilih--</option>
								@foreach($kategori as $item)
									<option value="{{ $item->id}}">{{ $item->nama_kategori}}</option>
								@endforeach
							</select>
                        </div>
						<div class="form-group">
                            <label >Gambar Artikel</label>
                            <input type="file" name="gambar_artikel" class="form-control">
                        </div>
						<div class="form-group">
                            <label >Status</label>
                            <select name="is_active" class="form-control">
								<option>--Pilih--</option>
								<option value="1">Publish</option>
								<option value="0">Draft</option>
							</select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
							<button class="btn btn-danger"><i class="fas fa-times-circle"></i> Reset</button>	
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection