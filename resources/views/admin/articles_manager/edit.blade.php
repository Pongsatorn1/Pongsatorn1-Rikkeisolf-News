@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container pt-5 py-2 ">
    <h1>Edit Article</h1>
    <hr>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ url('articles',  [$article->id]) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$article->title}}" class="form-control" id="articleTitle" name="title" />
        </div>



        <div class="form-group">
            <label for="story">Deccription</label>
            <textarea class="form-control " id="articledescription" rows="2"
                name="description">{{$article->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="story">Story</label>
            <textarea class="form-control  my-editor" id="articlestory" rows="12"
                name="story">{!!$article->story!!}</textarea>
        </div>

        <div class="form-group">

            <label for="Category">Category :</label>
            <select class="browser-default custom-select" name="category_id" id="">
                <option selected>Open this select menu</option>
                @foreach($categorylist as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

<div class="form-group">
    <h3 align="center">File Uploading image News</h3>
    <br>
    <input type="file" value="{{$article->imagenews}}" name="imagenews" class="form-control">
</div>

<div class="form-group row pt-2">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </div>
</div>
</form>

</div>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                'body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endsection
