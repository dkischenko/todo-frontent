<div class="modal fade" id="edit-project-{{$project->id}}" tabindex="-1" role="dialog"
     aria-labelledby="edit-project-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('projects.update', $project->id) }}" method="POST" id="form-update-project-{{$project->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input class="form-control" type="text" maxlength="255"
                               name="title" value="{{$project->title}}" placeholder="Project title">
                    </div>
                    <input name="user_id" value="{{Auth::id()}}" hidden>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"
                        form="form-update-project-{{$project->id}}">Save changes</button>
            </div>
        </div>
    </div>
</div>
