<div class="page-content">
<?php
if($user->isAdmin()){

?>
<?php } ?>
 <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i> Alternativy</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="Zbaliť/Rozbaliť" title=""> </a>
                                            
                                        </div>
                                    </div>
                                    <div class="portlet-body">
									                                         <div class="table-responsive">
                                            <table class="table table-bordered">
                                               <thead>
                                                    <tr>
														<th>ID</th>
														  <th>Artikel</th>
														  <th>Artikel version</th>
														  <th>Manufacturer part number</th>
														  <th>Footprint</th>
														  <th>Manufacturer</th>
														  <th>Original Manufacturer</th>
														  <th>Notice</th>
														  
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php
												//**********
												$statement_part_a="";
												$statement_part_b="";
												$url_part="&";
												if(isset($_GET['search']) && isset($_GET['search_option'])){
													if($_GET['search_option']==1){$statement_part_a=" WHERE cislo_modulu LIKE('%".$_GET['search']."%')"; $statement_part_b=" AND cislo_modulu LIKE('%".$_GET['search']."%')";}
													if($_GET['search_option']==2){$statement_part_a=" WHERE vp  LIKE('%".$_GET['search']."%')"; $statement_part_b=" AND vp  LIKE('%".$_GET['search']."%')";}
													$url_part="search=".$_GET['search']."&search_option=".$_GET['search_option']."&";
												}
												//**********
												$page = (int) (!isset($parameter[2]) ? 1 : $parameter[2]);
												$limit = 50;
												$url="?".$url_part."modul=alternativy";
												$startpoint = ($page * $limit) - $limit;
												$c=$connect;
												
												if($user->isAdmin()){
													$statement = "articles".$statement_part_a;
												}
												else{
													$statement = "articles WHERE author=".$_SESSION['user_id'].$statement_part_b;
												}
										
												$query_zaznamy="SELECT * FROM ".$statement." ORDER BY id DESC LIMIT $startpoint, $limit";
												$apply_zaznamy=mysqli_query($connect,$query_zaznamy);
												while($result_zaznamy=mysqli_fetch_array($apply_zaznamy)){
												?>
												<tr>
                                                        
														<td> <?php echo $result_zaznamy['id']; ?></td>
														<td> <?php echo $result_zaznamy['artikel']; ?></td>
														<td> <?php echo $result_zaznamy['artikel_version']; ?></td>
														<td> <?php echo $result_zaznamy['manufacturer_part_number']; ?></td>
														<td> <?php echo $result_zaznamy['footprint']; ?></td>
                                                        <td> <?php echo $result_zaznamy['manufacturer']; ?></td>
														<td> <?php echo $result_zaznamy['original_manufacturer']; ?></td>
														<td> <?php echo $result_zaznamy['notice']; ?></td>
														<td> <?php echo $user->returnUserFullname($result_zaznamy['author'],$connect); ?></td>
														
                                                       
                                                    </tr>
												<?php } ?>	
													
                                                </tbody>
                                            </table>
											<?php	echo "<center>".pagination($statement,$limit,$page,$url,$c)."</center>"; ?>
															
                                        </div>
								
                                       
									
                                    </div>
                                </div>
						
 </div>