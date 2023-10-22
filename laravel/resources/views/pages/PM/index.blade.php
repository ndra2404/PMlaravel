@extends('templates')
@section('content')
@php
DB::table('hasil')->truncate();
@endphp
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="row g-gs">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3 nav-tabs-s1">
                                @foreach($jurusan as $row)
                                <li class="nav-item"> <button class="nav-link {{$row->id==1?'active':''}}" data-bs-toggle="tab" data-bs-target="#custom-{{$row->id}}"
                                    type="button">{{$row->jurusan}}</button> </li>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                @foreach($jurusan as $row)
                                    <div class="tab-pane fade show {{$row->id==1?'active':''}}" id="custom-{{$row->id}}">
                                            <h1>Nilai {{$row->jurusan}}</h1>
                                            <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                            <thead>
                                                <tr>
                                                    <th><span class="overline-title">Nama</span></th>
                                                    @foreach($kriterias as $r)
                                                        <th><span class="overline-title">{{$r->kriteria}}</span></th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($siswa as $sis)
                                                <tr>
                                                    <td>{{$sis->nama}}</td>
                                                    @foreach($kriterias as $r)
                                                        @php
                                                            $value = DB::table('nilai')
                                                            ->where('id_siswa',$sis->id)
                                                            ->where('id_kriteria',$r->id)
                                                            ->select('nilai')
                                                            ->first();
                                                        @endphp
                                                        <td>{{$value->nilai??0}}</td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h3>Tabel Pemetaan nilai GAP, Nilai Siswa Dikurangi Nilai {{$row->jurusan}}</h3>
                                            <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2"><span class="overline-title">Nama</span></th>
                                                    @foreach($kriterias as $r)
                                                        <th><span class="overline-title">{{$r->kriteria}}</span></th>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    @foreach($kriterias as $r)
                                                        @php
                                                            $value = DB::table('nilai_minimal')
                                                            ->where('id_jurusan',$row->id)
                                                            ->where('id_kriteria',$r->id)
                                                            ->select('nilai')
                                                            ->first();
                                                        @endphp
                                                        <th>{{$value->nilai}}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($siswa as $sis)
                                                <tr>
                                                    <td>{{$sis->nama}}</td>
                                                    @foreach($kriterias as $r)
                                                        @php
                                                            $value = DB::table('nilai')
                                                            ->where('id_siswa',$sis->id)
                                                            ->where('id_kriteria',$r->id)
                                                            ->select('nilai')
                                                            ->first();

                                                            $valuegap = DB::table('nilai_minimal')
                                                            ->where('id_jurusan',$row->id)
                                                            ->where('id_kriteria',$r->id)
                                                            ->select('nilai')
                                                            ->first();

                                                            $hasil = ($value->nilai??0)-($valuegap->nilai??0);
                                                        @endphp
                                                        <td>{{$value->nilai??0}}-{{$valuegap->nilai??0}} = {{$hasil}}</td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                        <h3>Tabel Pembobotan hasil nilai GAP {{$row->jurusan}}</h3>
                                            <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2"><span class="overline-title">Nama</span></th>
                                                    @foreach($kriterias as $r)
                                                        <th><span class="overline-title">{{$r->kriteria}}</span></th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($siswa as $sis)
                                                <tr>
                                                    <td>{{$sis->nama}}</td>
                                                    @foreach($kriterias as $r)
                                                        @php
                                                            $value = DB::table('nilai')
                                                            ->where('id_siswa',$sis->id)
                                                            ->where('id_kriteria',$r->id)
                                                            ->select('nilai')
                                                            ->first();

                                                            $valuegap = DB::table('nilai_minimal')
                                                            ->where('id_jurusan',$row->id)
                                                            ->where('id_kriteria',$r->id)
                                                            ->select('nilai')
                                                            ->first();

                                                            $hasil = ($value->nilai??0)-($valuegap->nilai??0);

                                                            $bobot = DB::table('pembobotan')
                                                            ->where('selisih',$hasil)
                                                            ->select('bobot')
                                                            ->first();
                                                        @endphp
                                                        <td>{{$hasil}} = {{$bobot->bobot}}</td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                        <h3>Hasil Akhir {{$row->jurusan}}</h3>
                                            <table class="datatable-init table" data-nk-container="table-responsive table-border">
                                            <thead>
                                                @php
                                                $cf = DB::table('kriterias_map as km')->where('id_jurusan',$row->id)
                                                ->join('kriterias as c','km.id_kriteria','=','c.id')
                                                ->select('kriteria')
                                                ->where('tipe','CF')->get();

                                                $sf = DB::table('kriterias_map as km')->where('id_jurusan',$row->id)
                                                ->join('kriterias as c','km.id_kriteria','=','c.id')
                                                ->select('kriteria')
                                                ->where('tipe','SF')->get();

                                                $cfArray = array();
                                                $sfArray = array();
                                                foreach($cf as $r){
                                                    array_push($cfArray,$r->kriteria);
                                                }
                                                foreach($sf as $r){
                                                    array_push($sfArray,$r->kriteria);
                                                }
                                                @endphp
                                                <tr>
                                                    <th rowspan="2"><span class="overline-title">Nama</span></th>
                                                    <th><span class="overline-title">{{implode(' + ',$cfArray)}}</span></th>
                                                    <th><span class="overline-title">CF*60%</span></th>
                                                    <th><span class="overline-title">{{implode(' + ',$sfArray)}}</span></th>
                                                    <th><span class="overline-title">SF*40%</span></th>
                                                    <th><span class="overline-title">(CF*60%)+(SF*40%)</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($siswa as $sis)
                                                <tr>
                                                    <td>{{$sis->nama}}</td>
                                                    @php
                                                    $cf = DB::table('kriterias_map')->where('id_jurusan',$row->id)
                                                    ->where('tipe','CF')->get();

                                                    $sf = DB::table('kriterias_map')->where('id_jurusan',$row->id)
                                                    ->where('tipe','SF')->get();

                                                    $vhasil = 0;
                                                    $fhasil = 0;
                                                    $varray = array();
                                                    $farray = array();
                                                    foreach($cf as $r){
                                                            $value = DB::table('nilai')
                                                            ->where('id_siswa',$sis->id)
                                                            ->where('id_kriteria',$r->id_kriteria)
                                                            ->select('nilai')
                                                            ->first();


                                                            $valuegap = DB::table('nilai_minimal')
                                                            ->where('id_jurusan',$row->id)
                                                            ->where('id_kriteria',$r->id_kriteria)
                                                            ->select('nilai')
                                                            ->first();

                                                            $hasil = ($value->nilai??0)-($valuegap->nilai??0);

                                                            $bobot = DB::table('pembobotan')
                                                            ->where('selisih',$hasil)
                                                            ->select('bobot')
                                                            ->first();
                                                            array_push($varray,$bobot->bobot);
                                                            $vhasil += $bobot->bobot;
                                                    }

                                                    foreach($sf as $r){
                                                            $value = DB::table('nilai')
                                                            ->where('id_siswa',$sis->id)
                                                            ->where('id_kriteria',$r->id_kriteria)
                                                            ->select('nilai')
                                                            ->first();

                                                            $valuegap = DB::table('nilai_minimal')
                                                            ->where('id_jurusan',$row->id)
                                                            ->where('id_kriteria',$r->id_kriteria)
                                                            ->select('nilai')
                                                            ->first();

                                                            $hasil = ($value->nilai??0)-($valuegap->nilai??0);

                                                            $bobot = DB::table('pembobotan')
                                                            ->where('selisih',$hasil)
                                                            ->select('bobot')
                                                            ->first();
                                                            array_push($farray,$bobot->bobot);
                                                            $fhasil += $bobot->bobot;
                                                    }

                                                    $cfHasil = round($vhasil/count($varray),2);
                                                    $sfHasil = round($fhasil/count($farray),2);

                                                    $cfHasilKali = round($cfHasil*(60/100),2);
                                                    $sfHasilKali = round($sfHasil*(40/100),2);

                                                    $total = $cfHasilKali+$sfHasilKali;

                                                    DB::table('hasil')->insert([
                                                        'id_jurusan'=>$row->id,
                                                        'id_siswa'=>$sis->id,
                                                        'hasil'=>$total
                                                        ]);
                                                    @endphp
                                                    <td>{{implode('+',$varray)}} = {{$vhasil}} / {{count($varray)}} = {{$cfHasil}}</td>
                                                    <td>{{$cfHasil}} * 60% = {{$cfHasilKali}}</td>
                                                    <td>{{implode('+',$farray)}} = {{$fhasil}} / {{count($farray)}} = {{$sfHasil}}</td>
                                                    <td>{{$sfHasil}} * 40% ={{$sfHasilKali}}</td>
                                                    <td>{{$cfHasilKali}}+{{$sfHasilKali}} = {{$total}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
