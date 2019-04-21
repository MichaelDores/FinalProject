@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Question</div>

                    <div class="card-body">

                        {{$question->body}}
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary float-right"
                           href="#">
                            Edit Question
                        </a>


                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><a class="btn btn-primary float-left"
                                                href="#">
                            Answer Question
                        </a></div>

                    <div class="card-body">
                        @forelse($question->answers as $answer)
                            <div class="card">
                                <div class="card-body">{{$answer->body}}</div>
                                <div class="card-footer">

                                    <a class="btn btn-primary float-right"
                                       href="{{ route('answer.show', ['question_id'=> $question->id,'answer_id' => $answer->id]) }}">
                                        View
                                    </a>

                                </div>
                            </div>
                        @empty
                            <div class="card">

                                <div class="card-body"> No Answers</div>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
@endsection