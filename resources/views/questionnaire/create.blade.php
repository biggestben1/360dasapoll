@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Questionnaire</div>

                    <form action="/questionnaires" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Title">
                            <small id="title" class="form-text text-muted">Give your questionnaire a title that attracts attention.</small>
                            @error('title')
                            <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="purpose" placeholder="Purpose">
                            <small id="purpose" class="form-text text-muted">Giving apurpose will increase responses</small>
                            @error('purpose')
                            <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Questionnaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
