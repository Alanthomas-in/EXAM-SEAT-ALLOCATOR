<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add ROOM / HALL  </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">ROOM / HALL :</label>
                                           <input type="text" name="room_name" class = "form-control" required>
                                          
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Block Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="block_name" required>
                                    </div>
                                </div>
                               <div class="control-group">
                                           <label class="control-label" for="inputEmail">Row Count :</label>
                                           <input type="text" name="row_count" class = "form-control"   required  pattern="[0-9]+" title="Please enter Numbers only">
                                          
                                 </div>
                               <div class="control-group">
                                           <label class="control-label" for="inputEmail">Column Count :</label>
                                           <input type="text" name="col_count" class = "form-control"   required  pattern="[0-9]+" title="Please enter Numbers only">
                                          
                                 </div>

                              
								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
									  
									   <?php include ('connect.php');
                            if (isset($_POST['go'])) {

                                $room = $_POST['room_name'];
                                $block_name = $_POST['block_name'];
                                $row_count = $_POST['row_count'];
                                $col_count = $_POST['col_count'];
                                



                                mysqli_query($link,"insert into room (room_name,block_name,row_count,col_count)
                            	values ('$room','$block_name','$row_count','$col_count')
                                ") or die(mysqli_error($link));

                                header('location:forroom.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>