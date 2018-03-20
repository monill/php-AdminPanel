@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Blog</h3>
                <p class="text-muted m-b-30 font-13"> Editar </p>
                @include('admin.layout.errors')

                {!! Form::model($blog, ['url' => 'dashboard/blogs/' . $blog->id, 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal form-material']) !!}
                @include('admin.blogs.form', ['submitButton' => 'Atualizar'])
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection
