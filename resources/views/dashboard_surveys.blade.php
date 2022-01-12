@extends('layouts.master')

@section('content')
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Contribute a Vote!</h3></header>
            @foreach($surveys as $survey)
                <form action="{{ route('survey.take') }}" method="post">
                <article class="post" data-postid="{{ $survey->id }}">
                    @foreach(\App\Models\SurveyQuestion::all()->where('survey_id', $survey->id) as $question)
                        <p>{{ $question->body }}</p>
                        <div href="#" class="info">
                            Posted by
                            <a href="{{ route('user', $survey->user->id) }}" >{{  $survey->user->first_name }}</a>
                            on {{ $survey->created_at }}
                        </div>
                        <div class="interaction">
                            <div class="form-group">
                                    <fieldset id="group_{{ $survey->id }}">
                                        @if($question->option_1 != null)
                                            <div class="radio-inline">
                                            {{Form::radio('question['.$question->question_id.']', '1', Auth::user()->answers()->where('survey_id', $survey->id)->first() != null && Auth::user()->answers()->where('question_id', $question->question_id)->first()->option == 1, array('id' => "answer_".$survey->id)) }}
                                            {{ $question->option_1}}
                                         </div>
                                        @endif
                                        @if($question->option_2 != null)
                                            <div class="radio-inline">
                                                {{Form::radio('question['.$question->question_id.']', '2', Auth::user()->answers()->where('survey_id', $survey->id)->first() != null && Auth::user()->answers()->where('question_id', $question->question_id)->first()->option == 2, array('id' => "answer_".$question->question_id)) }}
                                                {{ $question->option_2}}
                                         </div>
                                        @endif
                                    </fieldset>
                            </div>
                            @if(Auth::user() == $survey->user)
                            <a href="#" class="edit">Edit</a> |
                            <a href="{{ route('survey.delete', ['$survey' => $survey->id]) }}">Delete</a>
                            @endif
                        </div>
                </article>
                    @endforeach
                    <button type="submit"  class="btn btn-primary"  >Finish Survey</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                    <input type="hidden" value="{{$survey->id}}" name="survey_id">
                </form>
            @endforeach
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = '{{ Session::token() }}';
        var urlSurveyEdit = '{{ route('survey.edit') }}';
    </script>
@endsection
