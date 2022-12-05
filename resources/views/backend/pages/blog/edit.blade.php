@extends('backend.layout')
@section('content')
<!-- page header -->
<div class="d-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
	<a href="{{ route('blogs')}}" class="btn btn-sm btn-dark d-sm-inline-block rounded">
		<i class="fas fa-arrow-left"></i> Kembali
	</a>
</div>

<div class="row">
	<div class="col-xl-8 col-md-12">
		<!-- tampilkan pesan berhasil jika sudah dimasukan dengan benar -->
		@if($message = session('success'))
			<x-alert type="success" :message="$message"/>
		@endif

		<div class="card">
			<div class="card-body">
				<form action="{{ route('update.blog',$blog->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="mb-3 form-group">
						<label for="title">Judul</label>
						<input type="text" class="form-control @error('title') @enderror" name="title" id="title" value="{{ old('title',$blog->judul) }}">
						@error('title')
						<span class="text-danger">{{$message}}</span>
						@enderror
					</div>
					<div class="mb-3 form-group">
						<label for="content">Konten</label>
						<textarea name="content" id="content" rows="10" class="form-control @error('content') @enderror">{{ old('content',$blog->ket)}}</textarea>
						@error('content')
						<span class="text-danger">{{$message}}</span>
						@enderror
					</div>
					<div class="mb-3 form-group">
						<label for="category">Kategori</label>
						<select name="category" id="category" class="form-control @error('category') @enderror">
							<option value="">Select</option>
							@foreach($categories as $item)
								<option value="{{$item->id}}" @if($item->id == $blog->id_kategori) selected @endif>{{$item->kategori}}</option>
							@endforeach
						</select>
						@error('category')
						<span class="text-danger">{{$message}}</span>
						@enderror
					</div>
					<div class="mb-3 form-group">
						<label for="img_file">Upload Gambar</label>
						<input type="file" class="form-control @error('img_file') @enderror" name="img_file" id="img_file" >
						<input type="hidden" name="file_gbr" id="file_gbr" value="{{ $blog->file_gbr }}">
						@error('img_file')
						<span class="text-danger">{{$message}}</span>
						@enderror
					</div>
					<div class="mb-3">
						<button class="btn btn-sm btn-primary rounded"><i class="fas fa-save fa-fw"></i>Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        <!-- select 2 multiple -->
        $('#category').select2({
            placeholder:"Select",
            allowClear:true
        });

		// setting plugin wysiwyg
        tinymce.init({
            selector:'textarea#content',
            menubar:'file edit view insert',
			height:600,
            menu:{
                insert:{
                    title:'Insert',items:'image link media addcomment pageembed template codesample|hr pagebreak nonbreaking anchor'
                }
            },
			plugins: [
			'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
			'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
			'media', 'table', 'emoticons', 'template', 'help'
			],
			content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    })
</script>

@endsection
