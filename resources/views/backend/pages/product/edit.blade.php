@extends('backend.layout')
@section('content')

 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    <a href="{{route('product')}}" class="btn btn-sm btn-dark d-sm-inline-block rounded">
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
                <form method="POST" enctype="multipart/form-data" action="{{route('update.produk',$product->id)}}">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="product_name">Nama Produk</label>
                        <input type="text" class="form-control @error('product_name') @enderror" name="product_name" id="product_name" value="{{ old('product_name',$product->nm_produk) }}" autocomplete="off">
                        @error('product_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="product_desc">Keterangan Produk</label>
                        <textarea type="text" class="form-control @error('product_desc') @enderror" name="product_desc" id="product_desc" rows="3">{{ old('product_desc',$product->ket_produk)}}</textarea>
                        @error('product_desc')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="product_price">Harga Produk</label>
                        <input type="number" class="form-control @error('product_price') @enderror" name="product_price" id="product_price" value="{{ old('product_price',$product->hrg_produk) }}" autocomplete="off">
                        @error('product_price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="product_file">Upload Produk</label>
                        <input type="file" name="product_file" id="product_file" class="form-control @error('product_file') @enderror">
                        @error('product_file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="old_file" id="old_file" value="{{old($product->gbr_produk)}}">
                        <button type="submit" class="btn btn-sm btn-primary rounded"><i class="fas fa-save fa-fw"></i>Simpan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
