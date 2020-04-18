

<?php if ( $errors->count() > 0 ){ ?>
   				<div class="alert alert-block alert-danger fade in">
              <button type="button" class="close close-sm" data-dismiss="alert">
                  <i class="fa fa-times"></i>
              </button>
              <?php foreach( $errors->messages() as $message ){ ?>
              	<p> <?=$message[0]?> </p>
               <?php } ?>
          </div>
				<?php } ?>	
     
       <?php if(Session::has('error_message')) { ?>
   			  
          <div class="alert alert-block alert-danger fade in">
              <button type="button" class="close close-sm" data-dismiss="alert">
                  <i class="fa fa-times"></i>
              </button>
              
                <p> {{ Session::get('error_message') }} </p>
               
          </div>
               
				<?php } ?>	
                
           <?php if(Session::has('success_message')) { ?>

              <div class="alert alert-block alert-success fade in">
              <button type="button" class="close close-sm" data-dismiss="alert">
                  <i class="fa fa-times"></i>
              </button>
              
                <p> {{ Session::get('success_message') }} </p>
               
          </div>

                            

				<?php }  ?>	    