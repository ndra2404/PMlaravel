@extends('templates')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="row g-gs">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                @csrf
                                <div class="row g-3 gx-gs">
                                    @foreach($kriterias as $row)
                                    @php
                                    $h = DB::table('nilai')->where('id_siswa',$id)
                                    ->select('nilai')
                                    ->where('id_kriteria',$row->id)->first();
                                    $nilai = $h->nilai??0;
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label">{{$row->kriteria}}</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select" name='kriteria[{{$row->id}}]' data-sort="false">
                                                    <option value="">Select Choose</option>
                                                    @if($row->jenis==0)
                                                        @foreach($jenisInt as $ji)
                                                        <option value="{{$ji->jenis_value}}" {{$nilai==$ji->jenis_value?'selected':''}}>{!!$ji->jenis_name!!}</option>
                                                        @endforeach
                                                    @endif
                                                    @if($row->jenis==1)
                                                        @foreach($jenisHuruf as $ji)
                                                        <option value="{{$ji->jenis_value}}" {{$nilai==$ji->jenis_value?'selected':''}}>{{$ji->jenis_name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div style='margin-top:10px'>
                                    <button type='submit' class='btn btn-primary'>Save</button>
                                    <a href="{{url('nilai')}}" class='btn btn-warning'>Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
