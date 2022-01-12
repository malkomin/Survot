@extends('layouts.master')
@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Start your vote!</h3></header>
            <form action="{{ route('survey.create') }}" method="post">
                <div class="form-group">
                    <textarea class="col-md-12 form-control" name="questions[question_1][body]" id="new-post" rows="1" placeholder="Your Question"></textarea>
                    <div class="form-check">
                        <label class="form-check-label">
                            <div style="margin-top: 15px;" class="mt-2 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_1][option][]" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_1][option][]"  rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_1][option][]" rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-2 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_1][option][]"  rows="1" placeholder="Your Option"></textarea></div>
                            <div style="margin-top: 15px;" class="mt-12 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_1][option][]"  rows="1" placeholder="Your Option"></textarea></div>
                        </label>
                    </div>
                    <div class="form-group">
                        <textarea class="col-md-12 form-control" name="questions[question_2][body]" id="new-post" rows="1" placeholder="Your Question"></textarea>
                        <div class="form-check">
                            <label class="form-check-label">
                                <div style="margin-top: 15px;" class="mt-2 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_2][option][]" rows="1" placeholder="Your Option"></textarea></div>
                                <div style="margin-top: 15px;" class="mt-2 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_2][option][]" rows="1" placeholder="Your Option"></textarea></div>
                                <div style="margin-top: 15px;" class="mt-2 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_2][option][]"  rows="1" placeholder="Your Option"></textarea></div>
                                <div style="margin-top: 15px;" class="mt-2 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_2][option][]"  rows="1" placeholder="Your Option"></textarea></div>
                                <div style="margin-top: 15px;" class="mt-2 col-md-12"><textarea class="mt-2 col-md-12 form-control" name="questions[question_2][option][]"  rows="1" placeholder="Your Option"></textarea></div>
                            </label>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Post Survey</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
                </div>
            </form>
        </div>
    </section>
@endsection
