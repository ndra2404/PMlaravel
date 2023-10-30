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
                        <a href="{{url('addNilai')}}" class='btn btn-primary' style='margin-bottom:10px'>Add</a>
                        <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                <thead>
                                    <tr>
                                        <th><span class="overline-title">Nama</span></th>
                                        @foreach($kriterias as $row)
                                        <th><span class="overline-title">{{$row->kriteria}}</span></th>
                                        @endforeach
                                        <th><span class="overline-title">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswas as $nilai)
                                    <tr>
                                        <td>{{$nilai->nama}}</td>
                                        @foreach($kriterias as $row)
                                            @php
                                            $id = $nilai->id;
                                            $h = DB::table('nilai')
                                            ->where('id_siswa',$id)
                                            ->where('id_kriteria',$row->id)
                                            ->select('nilai')
                                            ->first();
                                            $t = $h->nilai??0;
                                            @endphp
                                            <td>{{$t}}</td>
                                        @endforeach
                                        <td>
                                            @if(isset($nilai->id))
                                            <a href="{{url('nilai/'.$nilai->id)}}" class="btn btn-primary btn-sm"><em class="icon ni ni-edit"></em></a>
                                            @endif
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
