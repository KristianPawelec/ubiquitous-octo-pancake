<div class="page-content">
<?php
if(isset($_POST['submit'])){
	//$datum=date('Y/m/d', strtotime(str_replace('.', '-', $_POST['datum'])));
	$autor=$_SESSION['user_id'];
	echo $query_insert="INSERT INTO mapa(pracovisko_id,type,name,him,serial_nr,notice,created,author) VALUES('".$_POST['pracovisko_id']."','".$_POST['type']."','".$_POST['name']."','".$_POST['him']."','".$_POST['serial_nr']."','".$_POST['notice']."',NOW(),'".$autor."')";
	$apply_insert=mysqli_query($connect,$query_insert);
	if($apply_insert){
		echo '<div class="alert alert-success">Údaje boli zaznamenané.</div>';
	}
	else{echo '<div class="alert alert-danger">Údaje sa nepodarilo zaznamenať.</div>';}
}

?>
 <script>
 function getValue(){
    // find the dropdown
    var ddl = document.getElementById("devices");
    // find the selected option
    var selectedOption = ddl.options[ddl.selectedIndex];
    // find the attribute value
    var dataValue = selectedOption.getAttribute("data-box");
    // find the textbox
    var textBox1 = document.getElementById("nazov");
	var textBox2 = document.getElementById("notice");

    // set the textbox value
    if(dataValue=="1"){
        textBox1.value = "PCM";
    }
	else if(dataValue=="0"){
        textBox1.value = "";
		textBox2.value = "";
    else if(dataValue=="2"){
        textBox1.value = "NTB";
		textBox2.value = "";
    }   
	else if(dataValue=="3"){
        textBox1.value = "Monitor";
		textBox2.value = "";
    }  
	else if(dataValue=="4"){
        textBox1.value = "UPS";
		textBox2.value = "UPS-PCM";
    }   
	else if(dataValue=="5"){
        textBox1.value = "Tlaciaren";
		textBox2.value = "";
    }  
	else if(dataValue=="6"){
        textBox1.value = "Switch";
		textBox2.value = "";
    }  
	else if(dataValue=="7"){
        textBox1.value = "";
		textBox2.value = "";
    }
}
 </script>
 <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i> Pridať zariadenie</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="Zbaliť/Rozbaliť" title=""> </a>
                                            
                                        </div>
                                    </div>
                                    <div class="portlet-body">
									
								
                                       <form class="form-horizontal" role="form" method="POST" action="">
									   <div class="form-group">
                                                    <label class="col-md-3 control-label">Pracovisko ID</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="Pracovisko ID" name="pracovisko_id" value="" required="" id="pracovisko_id">
                                                        
													</div>
														
                                                </div>

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Type</label>
                                                    <div class="col-md-9">
													
													<select id="devices" class="form-control" onChange="return getValue();" name="type" required>
														<option data-box="0" value="">Vyberte...</option>
														<option data-box="1" value="1">PC</option>
														<option data-box="2" value="2">NTB</option>
														<option data-box="3" value="3">Monitor</option>
														<option data-box="4" value="4">UPS</option>
														<option data-box="5" value="5">Tlacrien </option>
														<option data-box="6" value="6">Switch</option>
														<option data-box="7" value="7">INE</option>
														
													</select>
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Názov</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="name" name="name" value="" id="nazov" required="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">HIM</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="HIM" name="him" value="" required="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
                                                    <label class="col-md-3 control-label">Serial Nr.</label>
                                                    <div class="col-md-9">
													
													<input class="form-control" size="16" type="text" placeholder="Serial Nr." name="serial_nr" value="" required="">
                                                        
													</div>
														
                                                </div>
												<div class="form-group">
												<label class="col-md-3 control-label">Notice:</label>
													<div class="col-md-9">
													<textarea class="form-control" id="notice" name="notice" rows="4" cols="50"></textarea><br>
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
