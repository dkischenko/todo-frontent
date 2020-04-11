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
                        <div class="input-group">
                            <input type="text" name="title" class="form-control" required placeholder="Start type here to create a task..."
                                   aria-label="Start type here to create a task..." aria-describedby="button-addon2">
                            <input name="project_id" value="{{$project->id}}" hidden>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Add a task</button>
                            </div>
                        </div>
                    </form>

                    <div class="tasks-of-project list-group">
                        @foreach($project->task as $task)
                            <div class="row draggable" id="row-task-{{$task->id}}">
                                <div class="col-md-10 list-group-item">
                                    <p>{{$task->title}}</p>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit-task-{{$task->id}}"><i class="fas fa-edit "></i></button>
                                    <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete-task-{{$task->id}}"><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                            @include('tasks.edit')
                            @include('tasks.delete')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <p>No project</p>
@endforelse
