@extends('backend.layout')
@section('content')

 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    <a href="{{route('blogs')}}" class="btn btn-sm btn-dark d-sm-inline-block rounded">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>


<div class="row">
    <div class="col-xl-8 col-md-12">

        {{-- tampilkan pesan berhasil jika data sudah terisi dengan benar --}}
        @if ($message = session('success'))
            <x-alert type="success" :message="$message" />
        @endif

        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control @error('title') @enderror" name="title" id="title" value="{{ old('title') }}" autocomplete="off">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="content">Konten</label>
                        <textarea type="text" class="form-control @error('content') @enderror" name="content" id="content" rows="10">{{ old('content')}}</textarea>
                        @error('content')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="category">Kategori</label>
                        <select  class="form-control @error('category') @enderror" name="category" id="category"> 
                            <option value="">Select</option>
                            @foreach($categories as $item)
                            <option value="{{ $item->id }}">{{$item->kategori}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="tags">Tag</label>
                        <select multiple  class="form-control @error('tags') @enderror" name="tags[]" id="tags" >  
                            @foreach($tags as $item)
                            <option value="{{$item->id}}">{{$item->tag}}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="img_file">Upload Gambar</label>
                        <input type="file" name="img_file" id="img_file" class="form-control @error('img_file') @enderror">
                        @error('img_file')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-primary rounded"><i class="fas fa-save fa-fw"></i>Simpan</button>
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

        $('#tags').select2({
            placeholder:"Select",
            allowClear:true,
        });

        // setting plugin wysiwyg
        tinymce.init({
            selector:'textarea#content',
            menubar:'file edit view insert',
            height:300,
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
