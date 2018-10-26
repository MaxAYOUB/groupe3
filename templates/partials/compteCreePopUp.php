<?php if(isset($_SESSION['pseudo']) !== "" &&  isset($_SESSION['pseudo']) !== null): ?>

<!--pop up  Modal Succes -->
<div class="modal fade" id="confirmation" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Succès</h4>
        </div>
        
        <div class="modal-body">
                <p>Votre compte a été bien crée.</p>
                  
              </div>
        
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
      
    </div>
  </div>  
</div>





<?php endif;?>