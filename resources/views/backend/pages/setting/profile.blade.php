@extends('backend.layout')
@section('content')

 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    <a href="{{route('admin')}}" class="btn btn-sm btn-dark d-sm-inline-block rounded">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>


<div class="row">
    <div class="col-xl-8 col-md-12">

        {{-- tampilkan pesan berhasil jika data sudah terisi dengan benar --}}
        @if ($message = session('success'))
            <x-alert type="success" :message="$message" />
        @endif

        @if ($message = session('error'))
            <x-alert type="danger" :message="$message" />
        @endif

        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('ubah.profil',$user->id)}}">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') @enderror" name="username" id="username" value="{{ old('username',$user->username) }}" autocomplete="off">
                        @error('username')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') @enderror" name="email" id="email" value="{{ old('email',$user->email) }}" autocomplete="off">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="img_file">Upload Gambar</label>
                        <input type="file" name="img_file" id="img_file" class="form-control @error('img_file') @enderror">
                        <input type="hidden" name="old_img" id="old_img" value="{{$profile->gbr_profil}}">
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

@endsection
