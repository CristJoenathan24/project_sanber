@extends('layouts.app')

@push('script-editor')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
    <div>
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="class-title">{{$data->question_title}}</h3>
                <span class="fc-light mr-3">created at: {{$data->created_at}} || viewed: {{$data->view_count}} || author: {{$data->author->name}} || reputation poin: {{$data->author->reputation_point}}</span>
            </div>

            <div class="card-body">
                <p>{{$data->question_body}}</p>
                <i class="fa fa-arrow-down rounded float-right mr-2" style="font-size:30px"></i><!--rencananya klo di klik brubah jd ijo klo mager gpp kwkwwk-->
                <i class="fa fa-arrow-up rounded float-right mr-3" style="font-size:30px"></i>
                {{-- foreach setiap comment --}}
                <div class="mb-5">&nbsp</div>
                @forelse ($question_comments as $question_comment)
                    <div class="border-top ml-5">
                        <h6>{{$question_comment->author->name}}</h6>
                        {{$question_comment->comment}}
                    </div>
                @empty
                    <div class="border-top ml-5">
                        no comment
                    </div>
                @endforelse

                {{-- kolom komentar --}}
                <form class="ml-5" role="form" method="POST" action="/question/comment/explorer/{{$data->question_id}}">
                    @csrf
                    @method('POST')
                    <div style="float: left">
                        <div class="form-group">
                            <input type="text" style="width: 80vw" class="form-control" id="QuestionComment" name="QuestionComment" placeholder="comments here">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm ml-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <h2 class="ml-1">Answers</h2>
            <div class="card-body">
                @forelse ($answers as $answer)
                    <div class="border-top">
                        <h6>{{$answer->author->name}}</h6>
                        {!! $answer->answer !!}
                    </div>

                    @forelse ($answer_comments as $answer_comment)
                        @if ($answer_comment->answer_id === $answer->answer_id)
                            <div class="border-top ml-5">
                                <h6>{{$answer_comment->author->name}}</h6>
                                {{$answer_comment->comment}}
                            </div>
                        @endif
                    @empty
                        <div class="border-top ml-5">
                            no comment
                        </div>
                    @endforelse

                    <div>
                        <form class="ml-5" role="form" method="POST" action="/answer/comment/explorer/{{ $answer->answer_id }}">
                            @csrf
                            @method('POST')
                            <div>
                                <div class="form-group">
                                    <input type="text" style="width: 80vw" class="form-control" id="AnswerComment" name="AnswerComment" placeholder="comments here">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="question_id" name="question_id" value="{{$data->question_id}}">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm ml-1">Submit</button>
                            </div>
                        </form>
                    </div>
                    <br>
                @empty
                    <h6>No Answers Yet</h6>
                @endforelse
            </div>
        </div>

        <div class="container mt-3">
            <form class="ml-5" role="form" method="POST" action="/answer/explorer/{{$data->question_id}}">
                @csrf
                @method('POST')
                <div>
                    <div class="form-group">
                        <label for="answer"><h2>Your Answer</h2></label>
                        <textarea name="answer" class="form-control my-editor" id="answer">{!! old('answer','') !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm ml-1">Submit</button>
                </div>
            </form>
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

