@extends('layouts.mainlayout_admin2')

@section('content')
<div class="container ">
    <h1>Edit Video</h1>
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

    <form action="{{ url('videos',  [$video->id]) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$video->title_video}}" class="form-control"  name="title_video" id="title_video" />
        </div>



        <div class="form-group">
            <label for="story">Deccription</label>
            <textarea class="form-control " id="story_video" rows="2"
                name="description_video">{{$video->description_video}}</textarea>
        </div>

        <div class="form-group">
            <label for="story">Story</label>
            <textarea class="form-control  my-editor" id="story_video" rows="12"
                name="story_video">{!!$video->story_video!!}</textarea>
        </div>

<div class="form-group">
    <h3 align="center">File Uploading image News</h3>
    <br>
    <input type="file" value="{{$video->namesvideo}}" name="namesvideo" class="form-control">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
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
