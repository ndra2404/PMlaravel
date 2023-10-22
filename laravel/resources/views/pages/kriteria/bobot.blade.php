@extends('templates')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="row g-gs">
                    <h1>Bobot</h1>
                    <div class="card">
                        <table class="datatable-init table" data-nk-container="table-responsive table-border">
                            <thead>
                                <tr>
                                    <th><span class="overline-title">Selisih</span></th>
                                    <th><span class="overline-title">Bobot</span></th>
                                    <th><span class="overline-title">Keterangan</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswas as $row)
                                    <tr>
                                        <td>{{$row->selisih}}</td>
                                        <td>{{$row->bobot}}</td>
                                        <td>{{$row->ket}}</td>
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
@endsection
