<div class="page-content">
<?php
if($user->isAdmin()){

?>								
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-search"></i> Vyhľadávanie
										</div>
									</div>
									<div class="portlet-body form">
										<form class="form-horizontal" role="form" method="GET">
											<div class="form-body">
												<div class="form-group">
													<input type="hidden" name="modul" value="statistika">
													<label class="col-md-3 control-label">Vyberte obdobie</label>
													<div class="col-md-3">
														<div class="input-inline input-medium">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input class="input-group form-control form-control-inline date date-picker" size="16" type="text" placeholder="Dátum od" id="od" name="datum_od" value="" data-date-format="yyyy-mm-dd" >
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="input-inline input-medium">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input class="input-group form-control form-control-inline date date-picker" size="16" type="text" placeholder="Dátum do" id="do" name="datum_do" value="" data-date-format="yyyy-mm-dd" >
															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<input type="hidden" name="modul" value="statistika">
													<div class="col-md-3">
														<input class="form-control" size="16" type="text" style="width:100%" placeholder="Text" id="search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
													</div>
													<div class="col-md-3">
														<div class="input-inline input-medium">
															<div class="input-group">
																<select class="input-group form-control form-control-inline" name="search_option" required>
																	<option value="">Vyhľadať podľa...</option>
																	<option value="1">Pracovník</option>
																	<option value="2">Stroj</option>
																	<option value="3">VP</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="form-actions right1">
												<button type="submit" class="btn blue">Vyhľadať</button>
											</div>
										</form>
									</div>
								</div>

<?php } ?>
 <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i> Záznamy</div>
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
														<th>Pracovník</th>
														  <th>Typ prace</th>
														  <th>Stroj</th>
														  <th>Kontakt</th>
														  <th>VP</th>
														  <th>Dátum</th>
														  
														  
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php
												//**********
												$statement_parts = array();
												$url_part="";
												
												if (isset($_GET['search']) && isset($_GET['search_option'])) {
												  $search_term = mysqli_real_escape_string($connect, $_GET['search']);
												  $search_option = (int) $_GET['search_option'];
												  
												   switch ($search_option) {
													case 1:
													  array_push($statement_parts, "os_c LIKE '%$search_term%'");
													  break;
													case 2:
													  array_push($statement_parts, "machine LIKE '%$search_term%'");
													  break;
													case 3:
													  array_push($statement_parts, "vp LIKE '%$search_term%'");
													  break;
												  } 
												  }
												  if (isset($_GET['datum_od']) && isset($_GET['datum_do'])) {
												  $datum_od = mysqli_real_escape_string($connect, $_GET['datum_od']);
												  $datum_do = mysqli_real_escape_string($connect, $_GET['datum_do']);
												  if (!empty($datum_od) && !empty($datum_do)) {
												  $statement_parts[] = "datum >= '$datum_od' AND datum <= '$datum_do'";
												  $url_part = "datum_od=$datum_od&datum_do=$datum_do&";
												  } else {
													  // Default date range
													  $default_start_date = '1900-01-01';
													  $default_end_date = '2100-01-01';
													  $statement_parts[] = "datum >= '$default_start_date' AND datum <= '$default_end_date'";
													  $url_part = "datum_od=$default_start_date&datum_do=$default_end_date&"; // Added a semicolon here

													}
												}
												if (!empty($statement_parts)) {
													$statement_part_a = "WHERE " . implode(" AND ", $statement_parts);
												} else {
													$statement_part_a = "";
												}
												$statement_part_a = "";
												if (!empty($statement_parts)) {
												  $statement_part_a = "WHERE " . implode(" AND ", $statement_parts);
												}

												//**********
												$page = (int) (!isset($parameter[1]) ? 1 : $parameter[1]);
												$limit = 50;
												
												$url = "index.php?";
												$startpoint = ($page * $limit) - $limit;

												if (!empty($url_part)) {
												  $url .= $url_part . "&";
												}
												if (isset($_GET['search']) && isset($_GET['search_option'])) {
												  $search = urlencode($_GET['search']);
												  $search_option = urlencode($_GET['search_option']);
												  $url .= "search=$search&search_option=$search_option&";
												}
												$url .= "modul=statistika";
												$c=$connect;
												
												if (isset($_GET['datum_od']) && isset($_GET['datum_do'])) {
												  $statement = "udrzba_strojov WHERE datum>='".$_GET['datum_od']."' AND datum<='".$_GET['datum_do']."'";
												} else {
												  $statement = "udrzba_strojov";
												}
												$statement = "udrzba_strojov $statement_part_a";
												 $query_zaznamy = "SELECT *, DATE_FORMAT(`datum`,'%Y.%m.%d %H:%i:%s') AS `datum_f` FROM udrzba_strojov $statement ORDER BY id DESC LIMIT $startpoint, $limit";
												$apply_zaznamy=mysqli_query($connect,$query_zaznamy);
												mysqli_num_rows($apply_zaznamy);
												
												while($result_zaznamy=mysqli_fetch_array($apply_zaznamy)){
												?>
												
												<tr>
                                                        
														<td> <?php echo $result_zaznamy['id']; ?></td>
														<td> <?php echo $result_zaznamy['os_c']; ?></td>
														<td> <?php echo $result_zaznamy['action_type']; ?></td>
														<td> <?php echo $result_zaznamy['machine']; ?></td>
														<td> <?php echo $result_zaznamy['kontakt']; ?></td>
														<td> <?php echo $result_zaznamy['vp']; ?></td>
														<td> <?php echo $result_zaznamy['datum']; ?></td>
                                                        
														
                                                       
                                                    </tr>
												<?php } ?>	
													
                                                </tbody>
                                            </table>
											<div>
											<?php	echo "<center>".pagination($statement,$limit,$page,$url,$c)."</center>"; ?>	
											</div>
                                        </div>
								
                                       
									
                                    </div>
                                </div>
						
 </div>