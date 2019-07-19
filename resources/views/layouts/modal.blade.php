<div class="modal fade" id="favoritesModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">The Sun Also Rises</h4>
      </div>
      <div class="modal-body">
        <p>
        Please confirm you would like to add 
        <b><span id="fav-title">The Sun Also Rises</span></b> 
        to your favorites list.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-danger pull-left fa fa-times " 
           data-dismiss="modal">
        </button>
        <span class="pull-right">
         
          <button  
          class="btn btn-success fa fa-envelope"
          type="button"
          data-resend-id="{{route('admin.compids.gmail',[$compid->id])}}" 
          data-target="#favoritesModals">
          </button>
        </span>
      </div>
    </div>
  </div>
</div>