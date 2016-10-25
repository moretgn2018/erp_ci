


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?PHP echo base_url();?>admin/location/viewGameboard">View Game Board</a>
					</li>
				</ul>
			</div>
            <?PHP if(isset($msg)){?>
                   <div id="error_div_strip">
                            <div class=" validation-error">
                                <div class="message message-error">
                                    <div class="message-inner">
                                        <div class="<?PHP echo $class;?>">
                                                        <a href="#" id="alert_close" class="btn  btn-round">
                                                                <i class="icon-remove"></i>
                                                        </a>
                                                      <?PHP echo $msg;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </div>
           	 <?PHP }?>
            
            
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Edit Game Board</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
				     
                   <form  name="f1" enctype="multipart/form-data"  method="post"   action="<?PHP echo base_url();?>admin/location/updateGameboard/<?PHP echo $parent_id.'/'.$child_id.'/'.$subchild_id;?>"  class="form-horizontal">
						   <?PHP  echo validation_errors(); ?>
                          <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
                              <div class="control-group">
                                                        <label class="control-label" for="selectError">Select Location</label>
                                                        <div class="controls">
                                                        
                                                              <select id="cat_id" onchange="get_sub(this.value);"  name="cat_id">
                                                                  <option value="">Select Category</option>
                                                                    <?PHP $selected ='selected="selected"';
                                                                     $i=1;foreach ($categories->result() as $result) {?>
                                                                            <option <?php if($result->id == $parent_id) echo $selected; ?> value="<?PHP echo $result->id;?>"><?PHP echo $result->title;?></option>
                                                                      <?PHP };?>
                                                              </select>
                                                        </div>
                                                      </div>
                              
                               <div class="control-group">
								<label class="control-label" for="selectError">Select Level</label>
								<div class="controls">
                                
                                      <select id="subcat_id"  name="subcat_id">
                                        
                                                                    <?PHP $selected ='selected="selected"';
                                                                     $i=1;foreach ($subcat->result() as $result1) {?>
                                                                            <option <?php if($result1->id == $child_id) echo $selected; ?> value="<?PHP echo $result1->id;?>"><?PHP echo $result1->title;?></option>
                                                                      <?PHP };?>
                                           
                                      </select>
								</div>
							  </div>
                              
							<div class="control-group">
							  <label class="control-label" for="typeahead">Title </label>
							  <div class="controls">
                              
								<input type="text" class="span6 typeahead"  name="game_board_title" id="game_board_title"  data-provide="typeahead" data-items="4" 
                                value="<?PHP if(isset($row)) echo $row->title;?>" >
                                 <span class="help-inline d_n" id="title_e">Please fill out this field</span>
                                 
                               </div>
							</div>
                            
                              <!--**************** PDf file **************-->
                            
                              <div id="images_Field_Cover">
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Day  Image</label>
                                    <div class="controls">
                                        <input class="input-file uniform_on" id="fileInput" type="file" name="image1" onchange="getImage('fileInput','upload_hidden');">
                          
                            </div>
                                     
                                </div>
                            </div>
                              		 <?PHP if($row->image1 <>"")
												$image = base_url().$row->image1;
													else
												$image = base_url().'img/no_img.jpg';
										?>
                              	
                                
                             <img src="<?PHP echo $image;?>" height="100" width="100">
                            <input type="hidden" name="hidden_img" id="hidden_img" value="<?PHP echo $row->image1;?>">  
                            <input type="hidden" name="upload_hidden" id="upload_hidden" value="0">  
                            <!--**************** PDf file  end **************-->
													<!--small-image	-->						 
                              <div id="images_Field_Cover"> 
                              <br> <br>
                                                    <div class="control-group">
                                                        <label class="control-label" for="fileInput"> Night image</label>
                                                        <div class="controls">
                                                            <input class="input-file uniform_on" id="fileInput" type="file" name="image2" onchange="getImage('fileInput','upload_hidden2');">
                                              
                                                </div>
                                                         
                                                    </div>
                                                </div>
                              		 <?PHP if($row->image2 <>"")
												$mediaImg = base_url().$row->image2;
													else
												$mediaImg = base_url().'img/no_img.jpg';
										?>
                              	
                                <img src="<?PHP echo $mediaImg;?>" height="100" width="100">
                           
                            <input type="hidden" name="hidden_img2" id="hidden_img2" value="<?PHP echo $row->image2;?>">  
                            <input type="hidden" name="upload_hidden2" id="upload_hidden2" value="0">  

          											<!--small-image	-->	
                            
                            
							<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Save changes">
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

<script>
	function get_sub(id){
	//alert(id);
    $.ajax({
        url: "<?php echo base_url().'admin/location/get_ajax_subcat'; ?>",
        type: 'POST',
		 data: {id: id},
        success: function(response) {
            if (response)
            {   
				//show success message
				$('#subcat_id').html(response);
            }
           }
	 });
	}
</script>
			<!--/row - ->
			
			
    

    

