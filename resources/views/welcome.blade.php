@extends("layouts.app")

@section('title', 'Welcome')

@section('content')
    <div class="container">
        @if(Auth::user())
            @include('projects.index')
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div>
                        <button class="btn btn-primary"
                           data-toggle="modal" data-target="#create-project">Create TODO list</button>
                    </div>
                </div>
            </div>
            @include('projects.create')
        @else
            <div class="row">
                <div>
                    <p>Welcome to ToDo App!</p>
                    <p>Please, login to use this app.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
