@extends('layouts.default')

@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h1 class="text-white pb-2 fw-bold">Playlist Video</h1>
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
						<div class="card-title">Tambah Data Playlist Video</div>
                        <a href="/playlist" class="btn btn-warning btn-sm ml-auto"><i></i> Kembali</a>
					</div>
				</div>
				<div class="card-body">
                    <form method="post" action="{{route('playlist.update', $playlist->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label >Judul Playlist Video</label>
                            <input type="text" name="judul_playlist" class="form-control" value="{{ $playlist->judul_playlist}}">
                        </div>
						<div class="form-group">
                            <label >Deskripsi</label>
                            <textarea name="deskripsi" id="editor1" class="form-control">
                                {{$playlist->deskripsi}} 
                            </textarea>
                        </div>
						<div class="form-group">
                            <label >Gambar Playlist</label>
                            <input type="file" name="gambar_playlist" class="form-control">
                            <br>
							<label>Gambar Saat Ini</label><br>
							<img src="{{ asset('uploads/' . $playlist->gambar_playlist)}}" width="100">
                        </div>
						<div class="form-group">
                            <label >Status</label>
                            <select name="is_active" class="form-control">
								<option>--Pilih--</option>
								<option value="1" {{ $playlist->is_active == '1' ? 'selected' : '' }}>
									Publish
								</option>
								<option value="0" {{ $playlist->is_active == '0' ? 'selected' : '' }}>
									Draft
								</option>
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