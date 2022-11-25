@extends('backend.layout')
@section('content')

 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    <a href="{{route('klien')}}" class="btn btn-sm btn-dark d-sm-inline-block rounded">
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
                <form method="POST" enctype="multipart/form-data" action="{{route('update.klien',$client->id)}}">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="client_name">Nama</label>
                        <input type="text" class="form-control @error('client_name') @enderror" name="client_name" id="client_name" value="{{ old('client_name',$client->nm_klien) }}" autocomplete="off">
                        @error('client_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="mobile_phone">No.Telp / HP</label>
                        <input type="text" class="form-control @error('mobile_phone') @enderror" name="mobile_phone" id="mobile_phone" value="{{ old('mobile_phone',$client->no_hp) }}" autocomplete="off">
                        @error('mobile_phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="mb-3 form-group">
                        <label for="job">Pekerjaan</label>
                        <input type="text" class="form-control @error('job') @enderror" name="job" id="job" value="{{ old('job',$client->pekerjaan) }}" autocomplete="off">
                        @error('job')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="address">Alamat</label>
                        <textarea type="text" class="form-control @error('address') @enderror" name="address" id="address" rows="3">{{ old('address',$client->alamat)}}</textarea>
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="testimonial">Testimoni</label>
                        <textarea type="text" class="form-control @error('testimonial') @enderror" name="testimonial" id="testimonial" rows="3">{{ old('testimonial',$client->testimoni)}}</textarea>
                        @error('testimonial')
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
                        <input type="hidden" name="old_file" id="old_file" value="{{$client->gbr_logo}}">
                        <button type="submit" class="btn btn-sm btn-primary rounded"><i class="fas fa-save fa-fw"></i>Simpan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
