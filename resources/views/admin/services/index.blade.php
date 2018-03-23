@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Serviços</h3>
                <div class="form-inline padding-bottom-15">
                    <div class="row">
                        <div class="col-sm-6">
                            @permission('c-services')
                            <div class="form-group">
                                <a href="{{ url('dashboard/services/create') }}" class="btn btn-outline btn-primary btn-sm">Add new</a>
                            </div>
                            @endpermission()
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Views</th>
                                <th>Título</th>
                                <th>Criado em</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
