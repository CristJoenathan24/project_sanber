@extends('layouts.app')

@push('script-editor')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
    <div>
        <!--rencana pake forelse karena buat index nampilin banyak-->
        <!--sama mau dikecilin biar jadi kotak aj gitu klu ini kan terlalu full tempatnya-->
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="class-title">judul pertanyaan disini</h3>
                <span class="fc-light mr-3">waktu dibuat</span>
                <span class="fc-light mr-3">view count</span>
                <span class="fc-light mr-3">view count</span>
                <span class="fc-light mr-3">nama penanya</span>
            </div>

            <div class="card-body">
                <p>sdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</p>
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger btn-md float-right">
                  </form>
                <a href="#" class="btn btn-md btn-info float-right mr-2">edit</a>
                <p><a href="#" class="text-primary">tag</a></p> <!--klo dipencet kebuka semua pertanyaan yg sama tagnya tp klo ribet ga usa-->
                <i class="fa fa-arrow-down rounded float-right mr-2" style="font-size:30px"></i><!--rencananya klo di klik brubah jd ijo klo mager gpp kwkwwk-->
                <i class="fa fa-arrow-up rounded float-right mr-3" style="font-size:30px"></i>

                <a href=""class="btn btn-primary btn-sm">answer</a><!--kepikirannya klo di klik pindah kehalaman show buat jawab-->
            </div>

            <div class="card-footer">
                <label for="answer">answer</label>
                <input type="text" class="form-control" name="answer" value="" id="answer" placeholder="put your answer here">
                <textarea name="answer" class="form-control my-editor">{!! old('answer', $answer ?? '') !!}</textarea>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>
@endpush
