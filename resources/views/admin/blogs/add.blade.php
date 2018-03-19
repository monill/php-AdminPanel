@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Blog</h3>
                <p class="text-muted m-b-30 font-13"> Adicionar </p>
                @include('admin.layout.errors')
                {!! Form::open(['url' => 'dashboard/blogs', 'files' => true, 'class' => 'form-horizontal form-material']) !!}
                @include('admin.blogs.form', ['submitButton' => 'Adicionar'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
