@extends('layouts.master')

@section('title', 'Laravel')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            @if(sizeof($setup)==0)
            <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#modal-tambah">Tambah Data</button>
            <hr>
            @endif
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
                                <th scope="col">Hari Kerja</th>
                                <th scope="col">Nama Aplikasi</th>
                                @can('tambah_data')

                                <th scope="col">Handle</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($setup as $no => $data)
                            <tr>
                                <th scope="row">{{ $no+1 }}</th>
                                <td>{{ $data->jumlah_hari_kerja }}</td>
                                <td>{{ $data->nama_aplikasi }}</td>
                                @can('tambah_data')

                                <td>
                                    <a href="#" data-id="{{ $data->id }}" class="btn btn-icon icon-left btn-success btn-edit">
                                        <i class="far fa-edit">Edit</i>
                                    </a>
                                    <a href="#" data-id="{{ $data->id }}" class="btn btn-icon icon-left btn-danger swal-confirm">
                                        <form action="{{ route('crud.delete',$data->id) }}" id="delete{{ $data->id }}" method="POST">
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
                </div>
            </div>
        </div>
    </div>
</div>

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Setup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('setup.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label @error('nama_aplikasi') class="text-danger" @enderror>Nama Aplikasi @error('nama_aplikasi') | {{ $message }} @enderror</label>
                                <input type="text" name="nama_aplikasi" value="{{ old('nama_aplikasi') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label @error('jumlah_hari_kerja') class="text-danger" @enderror>Jumlah Hari Kerja @error('jumlah_hari_kerja') | {{ $message }} @enderror</label>
                                <input type="text" name="jumlah_hari_kerja" value="{{ old('jumlah_hari_kerja') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Setup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('setup.store') }}" method="POST" id="form-edit">
                @csrf
                <div class="modal-body">
                    body
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-update">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
@endsection

@push('page-scripts')
<script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js">
</script>
@endpush

@push('after-scripts')
<script type="text/javascript">
    // $('.swal-confirm').click(function(e) {
    //     id = e.target.dataset.id;
    //     swal({
    //             title: 'Are you sure?' + id,
    //             text: 'Once deleted, you will not be able to recover this imaginary file!',
    //             icon: 'warning',
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 swal('Poof! Your imaginary file has been deleted!', {
    //                     icon: 'success',
    //                 });
    //             } else {
    //                 swal('Your imaginary file is safe!');
    //             }
    //         });
    // });

    $('.btn-edit').on('click', function() {
        // console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url: `/konfigurasi/setup/${id}/edit`,
            method: "GET",
            success: function(data) {
                // console.log(data)
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal({
                    show: true
                })
            },
            error: function(error) {
                console.log('error');
            }
        });
    });
    $('.btn-update').on('click', function() {
        // console.log($(this).data('id'))
        let id = $('#form-edit').find('#id-data').val()
        let formData = $('#form-edit').serialize()
        console.log(formData)
        console.log(id)
        $.ajax({
            url: `/konfigurasi/setup/${id}`,
            method: "PATCH",
            data: formData,
            success: function(data) {
                // console.log(data)
                // $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('hide')
                window.location.assign('/konfigurasi/setup')
            },
            error: function(err) {
                console.log(err.responseJSON)
                let err_log = err.responseJSON.errors;

                if (err.status == 422) {
                    if (typeof(err_log.nama_aplikasi) !== 'undefined') {
                        $('#modal-edit').find('[name="nama_aplikasi"]').prev().html('<span class="text-danger">Nama Aplikasi | ' + err_log.nama_aplikasi[0] + ' </span>')
                    } else {
                        $('#modal-edit').find('[name="nama_aplikasi"]').prev().html('<span>Nama Aplikasi</span>')
                    }
                    if (typeof(err_log.jumlah_hari_kerja) !== 'undefined') {
                        $('#modal-edit').find('[name="jumlah_hari_kerja"]').prev().html('<span class="text-danger">Jumlah Hari Kerja | ' + err_log.jumlah_hari_kerja[0] + ' </span>')
                    } else {
                        $('#modal-edit').find('[name="jumlah_hari_kerja"]').prev().html('<span>Jumlah Hari Kerja</span>')
                    }
                }
            }
        });
    });
</script>
@if (count($errors) > 0)
<script type="text/javascript">
    $(document).ready(function() {
        $('#modal-tambah').modal('show');
    });
</script>
@endif

@endpush