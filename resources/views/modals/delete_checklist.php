<!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4>Delete</h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following checklist item?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Checklist item: </label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="description_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" id="deleteChecklistItem" class="btn btn-danger delete" data-dismiss="modal">
                            <span class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>