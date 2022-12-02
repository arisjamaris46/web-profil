@extends('backend.layout')
@section('content')

 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    <a href="{{route('posting')}}" class="btn btn-sm btn-dark d-sm-inline-block rounded">
        <i class="fas fa-plus"></i> Tambah Blog Baru
    </a>
</div>

<div class="row">
    <div class="col-xl-12">
    @if ($message = session('success'))
            <x-alert type="success" :message="$message" />
    @endif

    @if ($message = session('error'))
            <x-alert type="danger" :message="$message" />
    @endif

        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="clientTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Pembuat</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>File Gambar</th>
                        <th>Opsi</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($blogs as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul}}</td>
                            <td>{{ Str::substr($item->ket, 0, 50)}}</td>
                            <td>{{ $item->user->username}}</td>
                            <td>{{$item->categories->kategori}}</td>
                            <td>{{ date_format($item->created_at,'Y-m-d h:i')  }}</td>
                            <td><img src="{{ asset('storage/'.$item->file_gbr)}}" class="img-thumbnail" alt="klien" width="72px"></td>
                            <td>
                                <a href="{{ route('edit.blog',$item->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit fa-fw"></i>Edit</a><a href="#" role="button" class="btn btn-sm btn-danger"><i class="fas fa-times fa-fw"></i>Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#clientTable').DataTable();
    });
</script>
@endsection

