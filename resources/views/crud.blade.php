@extends('layouts.master')

@section('title', 'Laravel')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            @can('tambah_data')
            <a href="{{ route('crud.tambah') }}" class="btn btn-icon icon-left btn-primary">
                <i class="far fa-edit">Tambah</i>
            </a>
            @endcan
            @if(session('message'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session('message') }}
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Hover</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">Light</div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode barang</th>
                                <th scope="col">Nama Barang</th>
                                @can('tambah_data')

                                <th scope="col">Handle</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tb_barang as $no => $b)
                            <tr>
                                <th scope="row">{{ $tb_barang->firstItem()+$no }}</th>
                                <td>{{ $b->kode_barang }}</td>
                                <td>{{ $b->nama_barang }}</td>
                                @can('tambah_data')

                                <td>
                                    <a href="#" class="btn btn-icon icon-left btn-success">
                                        <i class="far fa-edit">Edit</i>
                                    </a>
                                    <a href="#" data-id="{{ $b->id }}" class="btn btn-icon icon-left btn-danger swal-confirm">
                                        <form action="{{ route('crud.delete',$b->id) }}" id="delete{{ $b->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <i class="far fa-edit">Delete</i>
                                    </a>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tb_barang->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page-scripts')
<script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js">
</script>
@endpush

@push('after-scripts')
<!-- <script>
    $('.swal-confirm').click(function(e) {
        id = e.target.dataset.id;
        swal({
                title: 'Are you sure?' + id,
                text: 'Once deleted, you will not be able to recover this imaginary file!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal('Poof! Your imaginary file has been deleted!', {
                        icon: 'success',
                    });
                } else {
                    swal('Your imaginary file is safe!');
                }
            });
    });
</script> -->
@endpush