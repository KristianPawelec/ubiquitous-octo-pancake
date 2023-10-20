<div class="page-content">
<?php
if(isset($_POST['submit'])){
	//$datum=date('Y/m/d', strtotime(str_replace('.', '-', $_POST['datum'])));
	$autor=$_SESSION['user_id'];
	
	$original_manufacturer = (isset($_POST['original_manufacturer'])) ? 1 : 0;
	echo $query_insert="INSERT INTO articles(artikel,artikel_version,manufacturer_part_number,footprint,manufacturer,original_manufacturer,notice,created,author) VALUES('".$_POST['artikel']."','".$_POST['artikel_version']."','".$_POST['manufacturer_part_number']."','".$_POST['footprint']."','".$_POST['manufacturer']."','".$original_manufacturer."','".$_POST['notice']."',NOW(),'".$autor."')";
	$apply_insert=mysqli_query($connect,$query_insert);
	if($apply_insert){
		echo '<div class="alert alert-success">Údaje boli zaznamenané.</div>';
	}
	else{echo '<div class="alert alert-danger">Údaje sa nepodarilo zaznamenať.</div>';}
}

?>
<div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i> Pridat alternativu</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="Zbaliť/Rozbaliť" title=""> </a>
                                            
                                        </div>
                                    </div>
                                    <div class="portlet-body">
									
								
                                       <form class="form-horizontal" role="form" method="POST" action="">
                                            <div class="form-body">
                                                <div class="form-group">
                                                 
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Artikel</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="Artikel" name="artikel" value="" required="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Artikel version</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="Artikel version" name="artikel_version" value="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Manufacturer part number</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="Manufacturer part number" name="manufacturer_part_number" value=""  required="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Footprint</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="Footprint" name="footprint" value=""  required="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Manufacturer</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="Manufacturer" name="manufacturer" value=""  required="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Original Manufacturer</label>
                                                    <div class="col-md-1">
													
													<input class="form-control" size="16" type="checkbox" placeholder="Original Manufacturer" name="original_manufacturer" value=""  required="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
												<label class="col-md-3 control-label">Notice:</label>
													<div class="col-md-9">
													<textarea class="form-control" id="Notice" name="notice" rows="4" cols="50"></textarea><br>
													</div>
												</div>
												
												
                                               
                                            </div>
                                            <div class="form-actions right1">
                                                
                                                <button type="submit" class="btn blue" name="submit">Zaznamenať</button>
                                            </div>
                                        </form>
									
                                    </div>
                                </div>
						
 </div>