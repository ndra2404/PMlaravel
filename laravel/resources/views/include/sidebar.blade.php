<div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title">Applications</h6>
                                </li>
                                <li class="nk-menu-item"><a href="{{url('')}}" class="nk-menu-link"><span
                                            class="nk-menu-icon"><em class="icon ni ni-home"></em></span><span
                                            class="nk-menu-text">Home</span></a></li>
                                @if(Auth::user()->level==1)

                                <li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span
                                            class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span><span
                                            class="nk-menu-text">Master Data</span></a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item"><a href="{{url('siswa')}}"
                                                class="nk-menu-link"><span class="nk-menu-text">Siswa</span></a></li>
                                        <li class="nk-menu-item"><a href="{{url('nilai')}}"
                                                class="nk-menu-link"><span class="nk-menu-text">Nilai</span></a>
                                        </li>
                                        <li class="nk-menu-item"><a href="{{url('jurusan')}}"
                                                class="nk-menu-link"><span class="nk-menu-text">Jurusan</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span
                                            class="nk-menu-icon"><em class="icon ni ni-reports"></em></span><span
                                            class="nk-menu-text">Profile Matching</span></a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item"><a href="{{url('kriteria')}}"
                                                class="nk-menu-link"><span class="nk-menu-text">Kriteria</span></a></li>
                                        <li class="nk-menu-item"><a href="{{url('minimal')}}"
                                                class="nk-menu-link"><span class="nk-menu-text">Nilai Minimal</span></a>
                                        </li>
                                        <li class="nk-menu-item"><a href="{{url('bobot')}}"
                                                class="nk-menu-link"><span class="nk-menu-text">Bobot</span></a>
                                        </li>
                                        <li class="nk-menu-item"><a href="{{url('perhitungan')}}"
                                                class="nk-menu-link"><span class="nk-menu-text">Perhitungan</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item"><a href="{{url('rekomendasi')}}" class="nk-menu-link"><span
                                            class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span><span
                                            class="nk-menu-text">rekomendasi</span></a></li>
                                <li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span
                                            class="nk-menu-icon"><em class="icon ni ni-users"></em></span><span
                                            class="nk-menu-text">User Management</span></a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item"><a href="{{url('users')}}"
                                                class="nk-menu-link"><span class="nk-menu-text">Users List</span></a>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                                @if(Auth::user()->level==2)
                                <li class="nk-menu-item"><a href="{{url('perhitungan')}}" class="nk-menu-link"><span
                                            class="nk-menu-icon"><em class="icon ni ni-reports"></em></span><span
                                            class="nk-menu-text">Perhitungan</span></a></li>
                                            <li class="nk-menu-item"><a href="{{url('rekomendasi')}}" class="nk-menu-link"><span
                                            class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span><span
                                            class="nk-menu-text">Rekomendasi</span></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
