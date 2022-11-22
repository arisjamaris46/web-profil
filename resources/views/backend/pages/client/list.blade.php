@extends('backend.layout')
@section('content')

 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    <a href="{{route('tambah.klien')}}" class="btn btn-sm btn-dark d-sm-inline-block rounded">
        <i class="fas fa-plus"></i> Tambah Klien
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
                        <th>Nama</th>
                        <th>No Telp / HP</th>
                        <th>Alamat</th>
                        <th>Gambar</th>
                        <th>Opsi</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($clients as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nm_klien}}</td>
                            <td>{{ $item->no_hp}}</td>
                            <td>{{ Str::substr($item->alamat, 0, 50)}}</td>
                            <td><img src="{{ asset('storage/'.$item->gbr_logo)}}" class="img-thumbnail" alt="klien" width="72px"></td>
                            <td>
                                <a href="{{ route('edit.klien',$item->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit fa-fw"></i>Edit</a>&nbsp;<a href="{{ route('hapus.klien',$item->id) }}" role="button" class="btn btn-sm btn-danger"><i class="fas fa-times fa-fw"></i>Hapus</a>
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

