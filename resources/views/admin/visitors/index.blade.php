@extends('admin.layout.main')

@section('css')
    <link href="{{ asset('admin/vendors/datatables/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Visitantes</h3>
            <p class="text-muted m-b-30">Data table visitantes</p>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>IP</th>
                            <th>País</th>
                            <th>OS</th>
                            <th>Browser</th>
                            <th>Retornou</th>
                            <th>Acessos</th>
                            <th>Acessou em</th>
                            <th>Último acesso</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitors as $visitor)
                            <tr>
                                <td>{{ $visitor->ip }}</td>
                                <td>{{ $visitor->country }}</td>
                                <td>{{ $visitor->os_system }}</td>
                                <td>{{ $visitor->browser }}</td>
                                <td>{{ $visitor->has_returned ? 'Sim' : 'Nao' }}</td>
                                <td>{{ $visitor->access }}</td>
                                <td>{{ $visitor->created_at->format('d-m-Y H:i') }}</td>
                                <td>{{ $visitor->updated_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('admin/vendors/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                "order": [
                    [2, "desc"]
                ],
                "displayLength": 25,
                "searching": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
            });
        } );
    </script>
@endsection
