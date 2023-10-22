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
                                        <th><span class="overline-title">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswas as $siswa)
                                    <tr>
                                        <td>{{$siswa->kriteria}}</td>
                                        <td>
                                            <a href="{{url('kriteria/'.$siswa->id)}}" class="btn btn-primary btn-sm"><em class="icon ni ni-edit"></em></a>
                                            <a href="{{url('kriteria/delete/'.$siswa->id)}}" class="btn btn-danger btn-sm"><em class="icon ni ni-trash"></em></a>
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
@endsection
