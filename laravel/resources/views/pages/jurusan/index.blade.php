@extends('templates')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="row g-gs">
                    <div class="card">
                        <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <button type="button" class="btn btn-primary" style='margin-bottom:5px' data-bs-toggle="modal" data-bs-target="#exampleModal"> Add Siswa</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Jurusan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="row g-3 gx-gs">
                                            @csrf
                                                <input type="hidden" value="0" name="id_siswa" id="id_siswa">
                                                <div class="col-md-12">
                                                        <div class="form-group"><label class="form-label">Jurusan</label>
                                                            <div class="form-control-wrap">
                                                            <input type="text"
                                                                class="form-control" name="nama" id="nama"
                                                                placeholder="Input Nama">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                <thead>
                                    <tr>
                                        <th><span class="overline-title">Jurusan</span></th>
                                        <th><span class="overline-title">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswas as $siswa)
                                    <tr>
                                        <td>{{$siswa->jurusan}}</td>
                                        <td>
                                            <a data-id="{{$siswa->id}}" data-nama="{{$siswa->jurusan}}" class="btn btn-primary btn-sm edit"><em class="icon ni ni-edit"></em></a>
                                            <a onClick="return confirm('Are you sure you want to delete this data?');" href="{{url('jurusan/delete/'.$siswa->id)}}" class="btn btn-danger btn-sm"><em class="icon ni ni-trash"></em></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '.edit', function() {
        let data = $(this).data();
        $("#id_siswa").val(data.id)
        $("#nama").val(data.nama)
        $("#exampleModal").modal("show");
    });
});
</script>
@endsection
