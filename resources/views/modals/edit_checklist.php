<div id="editChecklistModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="favoritesModalLabel">Adicionar Item na Checklist</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" role="form">
        <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
          <div class="col-sm-12">
                  <input type="text" class="form-control" id="edit-itemDescription" >
                  <input type="hidden" class="form-control" id="edit-itemID" >
            </div>

            <div class="col-sm-12" style="padding-top:10px;">
                <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" name="edit-itemIsFilter" id="edit-itemIsFilter" type="checkbox" > Filtro de Pesquisa 
                    </label>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-4">
                        <label class="form-check-label" style="margin-bottom:15px;">
                          <input class="form-check-input" name="edit-itemHaveValue" id="edit-itemHaveValue" type="checkbox" > Campo com Valor 
                        </label>
                    </div>

                  <div class="col-sm-4">
                        <input type="text" class="form-control" id="edit-itemLabel" >
                  </div>

                </div>
            </div>

        </form>

      </div>
      <div class="modal-footer" style="border-top:0;">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="editChecklistItem"> Editar </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>