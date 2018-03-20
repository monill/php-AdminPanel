@extends('admin.layout.main')

@section('css')
    <!-- morris CSS -->
    <link href="{{ asset('admin/vendors/morrisjs/morris.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="icon-people text-info bg-inverse"></i>
                    <div class="bodystate">
                        <h4>{{ $visitors }}</h4>
                        <span class="text-muted">Visitantes</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-receipt bg-success"></i>
                    <div class="bodystate">
                        <h4>{{ $blogs }}</h4>
                        <span class="text-muted">Blogs</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-wallet bg-info"></i>
                    <div class="bodystate">
                        <h4>{{ $services }}</h4>
                        <span class="text-muted">Serviços</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user bg-danger"></i>
                    <div class="bodystate">
                        <h4>{{ $users }}</h4>
                        <span class="text-muted">Usuários</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 col-lg-4 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Sistemas operacionais</h3>
                <div id="morris-os" class="ecomm-donute" style="height: 317px;"></div>
            </div>
        </div>

        <div class="col-md-5 col-lg-4 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Navegadores</h3>
                <div id="morris-browsers" class="ecomm-donute" style="height: 317px;"></div>
            </div>
        </div>

        <div class="col-md-5 col-lg-4 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Países</h3>
                <div id="morris-countries" class="ecomm-donute" style="height: 317px;"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Serviços mais visualizados</h3>
                <p>Valores referente ao ano de {{ date('Y') }}</p>
                <div id="morris-bar-chart"></div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!--Morris JavaScript -->
    <script src="{{ asset('admin/vendors/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('admin/vendors/morrisjs/morris.js') }}"></script>
    <script src="{{ asset('admin/js/morris-data.js') }}"></script>

@endsection