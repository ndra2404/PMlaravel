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
                    @foreach($jurusan as $ju)
                        <div class="card">
                            <div class="card-body">
                            <h1>{{$ju->jurusan}}</h1>
                            <a href="{{url('addNilaiMinimal/'.$ju->id)}}" class='btn btn-primary btn-sm' style='margin-bottom:10px'>Add/Update</a>
                            <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                    <thead>
                                        <tr>
                                            <th><span class="overline-title">Kriteria</span></th>
                                            <th><span class="overline-title">Nilai</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $nilais = DB::table('nilai_minimal as nm')
                                            ->join('kriterias as c','c.id','=','nm.id_kriteria')
                                            ->select('kriteria','nm.nilai','nm.id')
                                            ->where('id_jurusan',$ju->id)->get();
                                        @endphp
                                        @foreach($nilais as $nilai)
                                        <tr>
                                            <td>{{$nilai->kriteria}}</td>
                                            <td>{{$nilai->nilai}}</td>
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
