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
						<div class="card-title">Edit Data Materi</div>
                        <a href="/materi" class="btn btn-warning btn-sm ml-auto"><i></i> Kembali</a>
					</div>
				</div>
				<div class="card-body">
				<form method="post" action="{{route('materi.update', $materi->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label >Materi Video</label>
                            <input type="text" name="judul_materi" class="form-control" value="{{$materi->judul_materi}}">
                        </div>
						<div class="form-group">
                            <label >Deskripsi</label>
                            <textarea name="deskripsi" id="editor1" class="form-control">{{$materi->deskripsi}} </textarea>
                        </div>
						<div class="form-group">
                            <label >Playlist</label>
                            <select name="playlist_id" class="form-control">
								<option value="">--Pilih--</option>
								@foreach($playlist as $item)
									@if($item->id == $materi->playlist_id)
										<option value="{{ $item->id}}" selected='selected'>{{ $item->judul_playlist}}</option>
									@else
									<option value="{{ $item->id }}">
										{{ $item->judul_playlist}}
									</option>
									@endif
								@endforeach
							</select>
                        </div>
						<div class="form-group">
                            <label >Gambar Materi</label>
                            <input type="file" name="gambar_materi" class="form-control">
							<br>
							<label>Gambar Saat Ini</label><br>
							<img src="{{ asset('uploads/' . $materi->gambar_materi)}}" width="100">
                        </div>
						<div class="form-group">
                            <label >Status</label>
                            <select name="is_active" class="form-control">
								<option>--Pilih--</option>
								<option value="1" {{ $materi->is_active == '1' ? 'selected' : '' }}>
									Publish
								</option>
								<option value="0" {{ $materi->is_active == '0' ? 'selected' : '' }}>
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