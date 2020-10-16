@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $questionnaire->title }}</h1>
                <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title)}}" method="post">
                    @csrf
                    @foreach($questionnaire->questions as $key=> $question)
                        <div class="card mt-4">

                            <div class="card-header"> <strong>{{ $key +1 }}</strong> {{ $question->question }}</div>

                            <div class="card-body">

                                @error('responses.'. $key.'.answer_id')
<small class="text-danger">{{ $message }}</small>
                                @enderror
                                <ul class="list-group">

                                    @foreach($question->answers as $answer)
                                        <label for="answer{{ $answer->id }}">
                                            <li class="list-group-item">
                                                <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}"
                                                       {{ (old('responses.'. $key.'.answer_id') == $answer->id)? 'checked': '' }}
                                                       class=" mr-2" value="{{ $answer->id }}">
                                                {{ $answer->answer }}
                                                <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                            </li>
                                        </label>


                                    @endforeach
                                </ul>
                            </div>


                        </div>
                        @endforeach



                <div class="card mt-4">
                    <div class="card-header">Your Information</div>


                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" name="survey[name]" class="form-control" id="name" aria-describedby="title" placeholder="Enter your Name">

                            @error('name')
                            <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Email</label>
                            <input type="email" name="survey[email]" class="form-control" id="email" aria-describedby="purpose" placeholder="Enter your Email">

                            @error('email')
                            <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
<div>                    <button type="submit" class="btn btn-dark">Complite Survey</button>
</div>


                </div>

            </div>
            </form>
        </div>
    </div>
@endsection
