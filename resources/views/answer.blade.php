@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Answer</div>
                    <div class="card-body">
                        {{$answer->body}}
                    </div>
                    <div class="card-footer">
                        {{ Form::open(['method'  => 'DELETE', 'route' => ['answer.destroy', $question, $answer->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                        <a class="btn btn-primary float-right" href="{{ route('answer.edit',['question_id'=> $question, 'answer_id'=> $answer->id, ])}}">
                            Edit Answer
                        </a>
                        {{ Form::open(['url' => 'vote', 'class' => 'vote']) }}
                        <div class="upvote vote_answer" data-answer="{{$answer->id}}" data-uid="{{Auth::id()}}">
                            <button class="btn btn-primary float-left mr-2" id="a-upvote"  class="upvote vote {{ $answer->user_id == Auth::id() ? 'vote_enabled' : '' }}
                            {{ $answer->votes && $answer->votes->contains('user_id', Auth::id()) ? ($answer->votes->where('user_id', Auth::id())->first()->vote == 1 ? 'upvote-on' : null) : null}}" data-vote="1"> Vote Up</button>
                            <br>
                            <br>
                            <button class="btn btn-primary float-left mr-2" id="a-downvote" class="downvote vote {{ $answer->user_id == Auth::id() ? 'vote_enabled' : '' }}
                            {{ $answer->votes && $answer->votes->contains('user_id', Auth::id()) ? ($answer->votes->where('user_id', Auth::id())->first()->vote <= 0 ? 'downvote-on' : null) : null}}" data-vote="-1">Vote Down</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection