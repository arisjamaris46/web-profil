@extends('backend.layout')
@section('content')

 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    <a href="{{route('tambah.tag')}}" class="btn btn-sm btn-dark d-sm-inline-block rounded">
        <i class="fas fa-plus"></i> Tambah Kategori
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
            <table class="table table-bordered" width="100%" id="categoryTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tag</th>
                        <th>Opsi</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($tags as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->tag }}
                            </td>
                            <td>
                                <a href="{{ route('edit.tag',$item->id) }}" role="button" class="btn btn-sm btn-primary"><i class="fas fa-edit fa-fw"></i>Edit</a>
                                <a href="{{ route('hapus.tag',$item->id) }}" role="button" class="btn btn-sm btn-danger"><i class="fas fa-trash fa-fw"></i>Hapus</a>
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
        $('#categoryTable').DataTable();
    });
</script>
@endsection

