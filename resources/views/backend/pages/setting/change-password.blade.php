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
                <form method="POST"  action="{{ route('ubah.password',$user->id)}}">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="old_pass">Password Lama</label>
                        <input type="text" class="form-control @error('old_pass') @enderror" name="old_pass" id="old_pass" value="{{ old('old_pass') }}" autocomplete="off">
                        @error('old_pass')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="new_pass">Password Baru</label>
                        <input type="text" class="form-control @error('new_pass') @enderror" name="new_pass" id="new_pass" value="{{ old('new_pass') }}" autocomplete="off">
                        @error('new_pass')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="pass_conf">Ulangi password</label>
                        <input type="text" name="pass_conf" id="pass_conf" class="form-control @error('pass_conf') @enderror" value="{{ old('pass_conf') }}">
                        @error('pass_conf')
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
