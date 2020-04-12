@forelse($projects as $project)
    @include('projects.edit')
    @include('projects.delete')

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <i class="far fa-calendar-alt"></i>
                            {{$project->title}}
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#edit-project-{{$project->id}}"><i class="fas fa-edit "></i></button>
                            <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete-project-{{$project->id}}"><i class="far fa-trash-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-inline" action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="input-group col-md-12">
                            <input type="text" name="title" class="form-control" required placeholder="Start type here to create a task..."
                                   aria-label="Start type here to create a task..." aria-describedby="button-addon2">
                            <input name="project_id" value="{{$project->id}}" hidden>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Add a task</button>
                            </div>
                        </div>
                    </form>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    @foreach($project->task as $task)
                                        <li class="list-group-item d-flex justify-content-between">
                                            <p class="p-0 m-0 flex-grow-1">@if($task->status)<i class="fas fa-check"></i>@endif
                                                {{$task->title}}</p>
                                            <p class="p-1 m-1 flex-grow-2">{{$task->deadline}}</p>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#edit-task-{{$task->id}}"><i class="fas fa-edit "></i></button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete-task-{{$task->id}}"><i class="far fa-trash-alt"></i></button>
                                        </li>
                                        @include('tasks.edit', ['project' => $project])
                                        @include('tasks.delete')
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <p>There are no projects</p>
        </div>
    </div>
@endforelse
