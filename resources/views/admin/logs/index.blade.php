@extends('admin.layout.main')

@section('css')
    <link href="{{ asset('admin/vendors/datatables/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Logs</h3>
                <p class="text-muted m-b-30">Data table logs</p>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ação</th>
                                <th>IP</th>
                                <th>Browser</th>
                                <th>OS</th>
                                <th>Quando</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->content }}</td>
                                <td>{{ $log->ip }}</td>
                                <td>{{ $log->browser }}</td>
                                <td>{{ $log->os_system }}</td>
                                <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
                "displayLength": 25
            });
        } );
    </script>
@endsection
