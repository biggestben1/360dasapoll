@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/addmore.js') }}" defer></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Question</div>

                    <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question[question]" class="form-control"
                                   value="{{old('question.question')}}"
                                   id="question" aria-describedby="title" placeholder="Question">
                            <small id="question" class="form-text text-muted">Ask simple and to-the-point questions for best results.</small>
                            @error('question.question')
                            <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>

                                 <legend> Choice</legend>
                                <small id="choiceHelp" class="form-text text-muted">Give choice that give you the most insight into your quetion.</small>

                                <div>
                                    <div class="form-group">
                                        <label for="answer1">Choices</label>
                                        <input type="text" name="answers[][answer]"
                                               value="{{old('answers.0.answer')}}"
                                               class="form-control" id="purpose" aria-describedby="purpose" required placeholder="Enter Answer 1">

                                        @error('answers.0.answer')
                                        <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>




<div id="dynamicTable"></div>
                                <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
