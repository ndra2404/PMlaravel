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
                                        @foreach($jurusan as $row)
                                        <th><span class="overline-title">{{$row->jurusan}}</span></th>
                                        @endforeach
                                        <th><span class="overline-title">Minat</span></th>
                                        <th><span class="overline-title">Rekomendasi</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswa as $sis)
                                    @php
                                        $rekomendasi = "-";
                                        $angka = 0;
                                        $minatnya = "Belum diinput";
                                    @endphp
                                    <tr>
                                        <td>{{$sis->nama}}</td>
                                        @foreach($jurusan as $row)
                                        @php
                                            $h = DB::table('hasil')->where('id_jurusan',$row->id)
                                            ->where('id_siswa',$sis->id)
                                            ->first();
                                            if(isset($h->hasil)){
                                                if($angka<$h->hasil??0){
                                                    $rekomendasi = $row->jurusan;
                                                    $angka = $h->hasil??0;
                                                }
                                            }
                                            $minat = DB::table('nilai')->where('id_siswa',$sis->id)->where('id_kriteria','6')
                                            ->first();
                                            if(isset($minat->nilai)){
                                                $jenis = DB::table('jenis')->where('jenis_value',$minat->nilai)->where('jenis',2)->first();
                                                $minatnya= $jenis->jenis_name;
                                            }
                                        @endphp
                                        <td>{{$h->hasil??'-'}}</td>
                                        @endforeach
                                        <td>{{$minatnya}}</td>
                                        <td>{{$rekomendasi}}</td>
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
