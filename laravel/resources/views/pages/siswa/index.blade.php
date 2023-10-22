@extends('templates')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="row g-gs">
                    <div class="card">
                        <div class="card-body">
                        <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                <thead>
                                    <tr>
                                        <th><span class="overline-title">Nama</span></th>
                                        <th><span class="overline-title">Asal Sekolah</span></th>
                                        <th><span class="overline-title">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswas as $siswa)
                                    <tr>
                                        <td>{{$siswa->nama}}</td>
                                        <td>{{$siswa->asal_sekolah}}</td>
                                        <td>
                                            <a href="{{url('siswa/'.$siswa->id)}}" class="btn btn-primary btn-sm"><em class="icon ni ni-edit"></em></a>
                                            <a href="{{url('siswa/delete/'.$siswa->id)}}" class="btn btn-danger btn-sm"><em class="icon ni ni-trash"></em></a>
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
@endsection
