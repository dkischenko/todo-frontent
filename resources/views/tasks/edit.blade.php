<div class="modal fade" id="edit-task-{{$task->id}}" tabindex="-1" role="dialog"
     aria-labelledby="edit-task-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" id="form-update-task-{{$task->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input class="form-control" id="title-{{$task->id}}" type="text" maxlength="255"
                               name="title" value="{{$task->title}}" placeholder="Project title">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="status-{{$task->id}}" type="checkbox"
                               name="status" value=1 @if($task->status) checked @endif>
                        <label for="status-{{$task->id}}" class="form-check-label">Status</label>
                    </div>
                    <div class="form-group">
                        <label for="date-{{$task->id}}">Deadline:</label>
                        <input id="date-{{$task->id}}" class="form-control" id="date-{{$task->id}}" type="date" maxlength="255"
                               name="deadline" value="{{$task->deadline}}" placeholder="Deadline">
                    </div>
                    <input name="project_id" value="{{$project->id}}" hidden>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"
                        form="form-update-task-{{$task->id}}">Save changes</button>
            </div>
        </div>
    </div>
</div>
