@extends('backend.layout')
@section('content')

 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
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
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($messages as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ Str::substr($item->subjek, 0, 30)}}</td>
                            <td>
                                @if ($item->status == 'pending')
                                    <span class="bg-warning text-white">Pending</span>
                                @endif
                                @if ($item->status == 'progress')
                                    <span class="bg-secondary text-white">Dalam Proses</span>
                                @endif
                                @if ($item->status == 'success')
                                    <span class="bg-info text-white">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('approve.pesanan',$item->id) }}" role="button" class="btn btn-sm btn-success"><i class="fas fa-check fa-fw"></i>Done</a>
                                <a href="{{ route('progress.pesanan',$item->id) }}" role="button" class="btn btn-sm btn-info"><i class="fas fa-tasks fa-fw"></i>Progress</a>
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

