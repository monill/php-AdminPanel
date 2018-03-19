
<div class="form-group">
    {!! Form::label('title', 'Título', ['class' => 'col-md-12']) !!}
    <div class="col-md-12">
        {!! Form::text('title', null, ['class' => 'form-control form-control-line', 'maxlenght' => '250'] ) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-6 col-md-4">
        {!! Form::label('meta_title', 'Meta Título', ['class' => 'col-md-12']) !!}
        <div class="col-md-12 col-md-4">
            {!! Form::textarea('meta_title', null, ['class' => 'form-control form-control-line', 'rows' => 3]) !!}
        </div>
    </div>

    <div class="form-group col-xs-6 col-md-4">
        {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'col-md-12']) !!}
        <div class="col-md-12 col-md-4">
            {!! Form::textarea('meta_keywords', null, ['class' => 'form-control form-control-line', 'rows' => 3]) !!}
        </div>
    </div>

    <div class="form-group col-xs-6 col-md-4">
        {!! Form::label('meta_description', 'Meta Descrição', ['class' => 'col-md-12']) !!}
        <div class="col-md-12 col-md-4">
            {!! Form::textarea('meta_description', null, ['class' => 'form-control form-control-line', 'rows' => 3]) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria', ['class' => 'col-sm-4']) !!}
    <div class="col-sm-3">
        {!! Form::select('category_id', $categs, null, ['class' => 'form-control form-control-line']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('image', 'Imagem', ['class' => 'col-md-12']) !!}
    <div class="col-md-12">
        {!! Form::file('image') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12 col-sm-12 col-xs-12">
        @if(isset($blog->image))
            <img src="{{ asset('/uploads/blogs/thumb/' . $blog->img) }}" id="img" height="200px">
        @else
            <img src="" id="img" height="200px">
        @endif
    </div>
    <p style="color:red;">Tamanho recomendado da imagem. MAX: 2MB<p>
</div>

<div class="form-group">
    {!! Form::label('video', 'Vídeo', ['class' => 'col-md-12']) !!}
    <div class="col-md-12">
        {!! Form::text('video', null, ['class' => 'form-control form-control-line', 'maxlenght' => '250'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', 'Conteúdo', ['class' => 'col-md-12']) !!}
    <div class="col-md-12">
        {!! Form::textarea('content') !!}
    </div>
</div>
<br /><br />

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::submit($submitButton, ['class' => 'btn btn-success btn-rounded btn-outline']) !!}
    </div>
</div>

@section('scripts')

    <script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        //Imagem principal
        $("#image").change(function () {
            readURL(this);
        });
        //Imagem principal
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#img").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        //TyneMCE
        $(document).ready(function() {
            if ($("#content").length > 0) {
                tinymce.init({
                    selector: "textarea#content",
                    language: 'pt_BR',
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                });
            }
        });

    </script>

@endsection