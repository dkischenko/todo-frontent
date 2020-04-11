<div class="modal fade" id="create-project" tabindex="-1" role="dialog"
     aria-labelledby="create-project-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('projects.store') }}" method="POST" id="form-create-project">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input class="form-control" type="text" maxlength="255" name="title"
                               placeholder="Project title" required>
                    </div>
                    <input name="user_id" value="{{Auth::id()}}" hidden>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form-create-project">Save changes</button>
            </div>
        </div>
    </div>
</div>
