@extends('templates')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="row g-gs">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                        <a href="{{url('addNilai')}}" class='btn btn-primary btn-sm' style='margin-bottom:10px'>Add</a>
                        <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                <thead>
                                    <tr>
                                        <th><span class="overline-title">Nama</span></th>
                                        <th><span class="overline-title">Asal Sekolah</span></th>
                                        <th><span class="overline-title">Nilai</span></th>
                                        <th><span class="overline-title">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($nilais as $nilai)
                                    <tr>
                                        <td>{{$nilai->nama}}</td>
                                        <td>{{$nilai->kriteria}}</td>
                                        <td>{{$nilai->nilai}}</td>
                                        <td>
                                            <a href="{{url('siswa/'.$nilai->id)}}" class="btn btn-primary btn-sm"><em class="icon ni ni-edit"></em></a>
                                            <a href="{{url('siswa/delete/'.$nilai->id)}}" class="btn btn-danger btn-sm"><em class="icon ni ni-trash"></em></a>
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
