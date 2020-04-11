<div class="modal fade" id="delete-project-{{$project->id}}" tabindex="-1" role="dialog"
     aria-labelledby="delete-project-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete current project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete current project?</p>
                <form action="{{ route('projects.destroy', $project->id) }}"
                      method="POST" id="form-delete-project-{{$project->id}}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" form="form-delete-project-{{$project->id}}">Delete</button>
            </div>
        </div>
    </div>
</div>
