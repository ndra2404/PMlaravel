@extends('templates')
@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="row g-gs">
                    <div class="card">
                        <div class="card-body">
                        <div class="modal fade" id="kriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="row g-3 gx-gs">
                                            @csrf
                                                <input type="hidden" value="0" name="id_siswa" id="id_siswa">
                                                <div class="col-md-6">
                                                        <div class="form-group"><label class="form-label">Nama</label>
                                                            <div class="form-control-wrap">
                                                            <input type="text"
                                                                class="form-control" name="nama" id="nama"
                                                                placeholder="Input Nama">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group"><label class="form-label">Jenis</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select" name="asal_sekolah" id="asal">
                                                                    <option value=""></option>
                                                                    <option value="0">Angka</option>
                                                                    <option value="1">Huruf Mutu</option>
                                                                    <option value="2">Minat</option>
                                                                </select>
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
                                        <th><span class="overline-title">Nama</span></th>
                                        <th><span class="overline-title">Jenis</span></th>
                                        <th><span class="overline-title">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $jenis=["Angka","Huruf Mutu","Minat"];
                                    @endphp
                                    @foreach($siswas as $siswa)
                                    <tr>
                                        <td>{{$siswa->kriteria}}</td>
                                        <td>{{$jenis[$siswa->jenis]}}</td>
                                        <td>
                                            <a data-id="{{$siswa->id}}" data-nama="{{$siswa->kriteria}}" data-jenis="{{$siswa->jenis}}" class="btn btn-primary btn-sm edit"><em class="icon ni ni-edit"></em></a>
                                            <!-- <a href="{{url('kriteria/delete/'.$siswa->id)}}" class="btn btn-danger btn-sm"><em class="icon ni ni-trash"></em></a> -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @foreach($jurusan as $row)
                        <div class="card">
                            <div class="card-body">
                            <h1>{{$row->jurusan}}</h1>
                            <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                    <thead>
                                        <tr>
                                            <th><span class="overline-title">Kriteria</span></th>
                                            <th><span class="overline-title">SF/CF</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $siswas = DB::table('kriterias_map as km')->join('kriterias as k','k.id','=','km.id_kriteria')
                                            ->select('km.tipe','k.kriteria')
                                            ->where('id_jurusan',$row->id)
                                            ->get();
                                        @endphp
                                        @foreach($siswas as $siswa)
                                        <tr>
                                            <td>{{$siswa->kriteria}}</td>
                                            <td>{{$siswa->tipe}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
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
        console.log(data)
        $("#id_siswa").val(data.id)
        $("#nama").val(data.nama)
        $("#asal").val(data.jenis).change()
        $("#kriteria").modal("show");
    });
});
</script>
@endsection
