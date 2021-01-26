@extends('layouts.master')

@section('title', 'Laravel')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            @can('tambah_data')
            <div class="row mb-1">
                <button class="btn btn-primary " data-toggle="modal" data-target="#modal-tambah">Tambah Data</button>
                <!-- {{ SiteHelpers::cek_akses() }} -->
                <button type="button" class="btn btn-danger" id="deleteAllSelectedRecords">Delete All</button>
            </div>
            @endcan
            <hr>
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
                                @can('tambah_data')
                                <th><input type="checkbox" name="" id="chkCheckAll"></th>
                                @endcan
                                <th scope="col">No</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Nama Ayah</th>
                                <th scope="col">Nama Ibu</th>
                                @can('tambah_data')
                                <th scope="col">Handle</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($k as $no => $kr)
                            <tr id="sid{{$kr->id}}">
                                @can('tambah_data')
                                <th> <input type="checkbox" name="ids" id="checkBoxClass" value="{{$kr->id}}"></th>
                                @endcan
                                <th scope="row">{{ $no+1 }}</th>
                                <td>{{ $kr->nama_karyawan }}</td>
                                @endforeach
                                <td>Staff</td>
                                <td>Budi</td>
                                <td>Yuni</td>

                                @can('tambah_data')
                                <td>
                                    <a href="#" data-id="{{ $kr->id }}" class="btn btn-icon icon-left btn-success btn-edit">
                                        <i class="far fa-edit">Edit</i>
                                    </a>
                                    <a href="#" data-id="{{ $kr->id }}" class="btn btn-icon icon-left btn-danger swal-confirm">
                                        <form action="{{ route('divisi.destroy',$kr->id) }}" id="delete{{ $kr->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <i class="far fa-edit">Delete</i>
                                    </a>
                                </td>
                                @endcan
                            </tr>
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
                <h5 class="modal-title">Form Tambah Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('divisi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label @error('nama') class="text-danger" @enderror>Divisi @error('nama') | {{ $message }} @enderror</label>
                                <input type="text" name="nama" value="{{ old('divisi') }}" class="form-control">
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
                <h5 class="modal-title">Form Edit Divisi</h5>
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
    $('.swal-confirm').on('click', function(e) {

        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {

                if (isConfirm) {

                    swal("Shortlisted!", "Candidates are successfully shortlisted!", "success");

                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                    e.preventDefault();
                }
            });

    });
    // console.log(swal("lala"));


    $('.btn-edit').on('click', function() {
        // console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url: `/master-data/divisi/${id}/edit`,
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
            url: `/master-data/divisi/${id}`,
            method: "PATCH",
            data: formData,
            success: function(data) {
                // console.log(data)
                // $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('hide')
                window.location.assign('/master-data/divisi')
            },
            error: function(err) {
                console.log(err.responseJSON)
                let err_log = err.responseJSON.errors;

                if (err.status == 422) {
                    if (typeof(err_log.nama) !== 'undefined') {
                        $('#modal-edit').find('[name="nama"]').prev().html('<span class="text-danger">Divisi | ' + err_log.nama[0] + ' </span>')
                    } else {
                        $('#modal-edit').find('[name="nama"]').prev().html('<span>Divisi</span>')
                    }
                }
            }
        });
    });
    $(function(e) {
        $("#chkCheckAll").click(function() {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
        $('#deleteAllSelectedRecords').click(function(e) {
            e.preventDefault();
            var allids = [];
            $("input:checkbox[name=ids]:checked").each(function() {
                allids.push($(this).val());
            });
            $.ajax({
                url: "{{route('divisi.deleteSelected')}}",
                type: 'DELETE',
                data: {
                    ids: allids,
                    _token: $("input[name=_token]").val()
                },
                success: function(response) {
                    $.each(allids, function(key, val) {
                        $('#sid' + val).remove();
                    })
                }
            })
        })
    });
</script>
@if (count($errors) > 0)
<script type="text/javascript">
    $(document).ready(function() {
        $('#modal-tambah').modal('show');
    });
</script>
<script>
</script>
@endif

@endpush