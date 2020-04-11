<div class="modal fade" id="delete-task-{{$task->id}}" tabindex="-1" role="dialog"
     aria-labelledby="delete-task-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete current task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete current task?</p>
                <form action="{{ route('tasks.destroy', $task->id) }}"
                      method="POST" id="form-delete-task-{{$task->id}}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" form="form-delete-task-{{$task->id}}">Delete</button>
            </div>
        </div>
    </div>
</div>
