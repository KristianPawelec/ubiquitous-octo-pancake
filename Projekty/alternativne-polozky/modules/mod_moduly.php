<div class="page-content">
<?php
if(isset($_POST['submit'])){
	//$datum=date('Y/m/d', strtotime(str_replace('.', '-', $_POST['datum'])));
	$autor=$_SESSION['user_id'];
	echo $query_insert="INSERT INTO modules(artikel_id,q,inf_st,speed,created,author) VALUES('".$_POST['artikel_id']."','".$_POST['q']."','".$_POST['inf_st']."','".$_POST['speed']."',NOW(),'".$autor."')";
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
                                            <i class="fa fa-calendar"></i> Moduly</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="Zbaliť/Rozbaliť" title=""> </a>
                                            
                                        </div>
                                    </div>
                                    <div class="portlet-body">
									
								
                                       <form class="form-horizontal" role="form" method="POST" action="">
                                            <div class="form-body">
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Artikel ID</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="artikel_id" name="artikel_id" value="" required="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">q</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="q" name="q" value="">
                                                        
													</div>
														
                                                </div>
												 <div class="form-group">
                                                    <label class="col-md-3 control-label">INF_ST</label>
                                                    <div class="col-md-9">
													
													<select class="form-control" name="inf_st" required>
														<option value="">Vyberte...</option>
														<option value="1">INF</option>
														<option value="2">ST</option>
													</select>
													</div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Speed</label>
                                                    <div class="col-md-9">
													
													<select class="form-control" name="speed" required>
														<option value="">Vyberte...</option>
														<option value="1">Low Speed</option>
														<option value="2">High Speed</option>
													</select>
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