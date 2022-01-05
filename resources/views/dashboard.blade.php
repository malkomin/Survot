@extends('layouts.master')

@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Start your vote!</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="col-md-12 form-control" name="body" id="new-post" rows="1" placeholder="Your Question"></textarea>
                    <div class=" form-check">
                        <label class=" row form-check-label">
                            <div style="margin-top: 15px;" class="mt-2 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_1" id="option_1" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_2" id="option_2" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_3" id="option_3" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_4" id="option_4" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-6"><textarea class="mt-2 col-md-2 form-control" name="option_5" id="option_5" rows="1" placeholder="Your Option"></textarea></div>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Post Vote</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Contribute a Vote!</h3></header>
            @foreach($posts as $post)
                <article class="post" data-postid="{{ $post->id }}">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
                    </div>
                    <div class="interaction">
                        <div class="form-group">
                            <form action="{{ route('vote') }}" method="post">
                                <fieldset id="group_{{ $post->id }}">
                                    @if($post->option_1 != null)
                                    <div class="radio-inline">
                                         {{Form::radio('vote', '1', Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 1, array('id' => "vote_".$post->id))}} {{ $post->option_1}}
                                    </div>
                                    @endif
                                    @if($post->option_2 != null)
                                    <div class="radio-inline">
                                        {{Form::radio('vote', '2', Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 2, array('id' =>  "vote_".$post->id))}} {{ $post->option_2}}
                                    </div>
                                    @endif
                                    @if($post->option_3 != null)
                                    <div class="radio-inline">
                                        {{Form::radio('vote', '3',Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 3 , array('id' =>  "vote_".$post->id))}} {{ $post->option_3}}
                                    </div>
                                    @endif
                                    @if($post->option_4 != null)
                                    <div class="radio-inline">
                                        {{Form::radio('vote', '4', Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 4, array('id' =>  "vote_".$post->id))}} {{ $post->option_4}}
                                    </div>
                                    @endif
                                    @if($post->option_5 != null)
                                    <div class="radio-inline">
                                        {{Form::radio('vote_', '5', Auth::user()->votes()->where('post_id', $post->id)->first() != null && Auth::user()->votes()->where('post_id', $post->id)->first()->vote == 5, array('id' => "vote_".$post->id))}} {{ $post->option_5}}
                                    </div>
                                    @endif
                                </fieldset>
                                <button type="submit" id="{{$post->id}}" class="vote">Vote</button>
                        @if(Auth::user() == $post->user)
                            </form>
                        </div>
                            <a href="#" class="edit">Edit</a> |
                            <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit') }}';
        var urlVote = '{{ route('vote') }}';
    </script>
@endsection
