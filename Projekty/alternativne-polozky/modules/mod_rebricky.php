<div class="page-content">
<?php
date_default_timezone_set('Europe/Bratislava');
 $t=time(); 
$current_time=(date("H:i",$t));


    include "functions.php";
    
    if(isset($_POST['set_work'])){
        insert_work();
    }
	
    
?>
<div class="portlet box blue ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-search"></i> Typ
											</div>
                                      
                                    </div>
									
                                    <div class="portlet-body form">
									
									 
                                        <form class="form-horizontal" role="form" method="post" accept-charset="utf-8">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <div class="col-md-7">
                                                       Typ práce
                                                        <select name="action_type" class="form-control" id="action_type">

                                                            <option value="1">Stroje</option>
                                                            <option value="4">Kontakty</option>

                                                        </select>	
                                                    </div>
												</div>
											</div>
									</div>
</div>
                                                
 <div class="portlet box blue  " id="set" style="display:none;">
                                   <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-industry"></i> Stroje</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="Zbaliť/Rozbaliť" title=""> </a>
                                            
                                        </div>
                                    </div>
                                    <div class="portlet-body">
									                                         <div id="stroj" class="table-responsive">
                                            <table id="stroj" class="table table-bordered">
                                               <thead>
                                                    <tr>
													
														  <th name="action_type">Stroj</th>
														  <th>Počet nastavení</th>
														  
														  
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php
												$page = (int) (!isset($parameter[1]) ? 1 : $parameter[1]);
												$limit = 600;
												$url="?modul=rebricky";
												$startpoint = ($page * $limit) - $limit;
												$c=$connect;
												if($user->isAdmin()){
													$statement = "udrzba_strojov";
												}
												else{
													$statement = "udrzba_strojov WHERE autor=".$_SESSION['user_id'];
												}
												$query_zaznamy="SELECT machine, COUNT(*) AS input_count FROM ".$statement." WHERE machine <> 0 GROUP BY machine ORDER BY input_count DESC LIMIT $startpoint, $limit";
												$apply_zaznamy=mysqli_query($connect,$query_zaznamy);
												while($result_zaznamy=mysqli_fetch_array($apply_zaznamy)){
												?>
												<tr>
                                                        
														
														<td> <?php echo $result_zaznamy['machine']; ?></td>
														<td> <?php echo $result_zaznamy['input_count']; ?></td>
														
                                                       
                                                    </tr>
												<?php } ?>	
													
                                                </tbody>
                                            </table>
											<?php	echo "<center>".pagination($statement,$limit,$page,$url,$c)."</center>"; ?>
                                </div>        
   </div>
</div>       
<div class="portlet box blue " id="ine" style="display:none;">
                                   <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-industry"></i>Kontakty</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="Zbaliť/Rozbaliť" title=""> </a>
                                            
                                        </div>
                                    </div>
                                    <div class="portlet-body">
									    <div id="kont" class="table-responsive">
                                            <table id="kont" class="table table-bordered">
                                               <thead>
                                                    <tr>
													
														  <th name="action_type">Kontakt</th>
														  <th>Počet nastavení</th>
														  
														  
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php
												$page = (int) (!isset($parameter[1]) ? 1 : $parameter[1]);
												$limit = 600;
												$url="?modul=rebricky";
												$startpoint = ($page * $limit) - $limit;
												$c=$connect;
												if($user->isAdmin()){
													$statement = "udrzba_strojov";
												}
												else{
													$statement = "udrzba_strojov WHERE autor=".$_SESSION['user_id'];
												}

												$query_zaznamy="SELECT kontakt, COUNT(*) AS input_count FROM ".$statement." WHERE action_type = 1 AND kontakt IS NOT NULL AND kontakt <> '' GROUP BY kontakt ORDER BY input_count DESC LIMIT $startpoint, $limit";
												$apply_zaznamy=mysqli_query($connect,$query_zaznamy);
												while($result_zaznamy=mysqli_fetch_array($apply_zaznamy)){
												?>
												<tr>
                                                        
														
														<td> <?php echo $result_zaznamy['kontakt']; ?></td>
														<td> <?php echo $result_zaznamy['input_count']; ?></td>
														
                                                       
                                                    </tr>
												<?php } ?>	
													
                                                </tbody>
                                            </table>
											<?php	echo "<center>".pagination($statement,$limit,$page,$url,$c)."</center>"; ?>
                                </div>        
   </div>
 </div>
 </div>
<script>
document.addEventListener('DOMContentLoaded', function(){

    function displayMachines(){
        var action = document.getElementById("action_type").value;
        if(action==1){
            document.getElementById("kont").style.display = "none";
            document.getElementById("stroj").style.display = "";
        }else if(action==4){
            document.getElementById("kont").style.display = "";
            document.getElementById("stroj").style.display = "none";
        }else{
			document.getElementById("kont").style.display = "";
            document.getElementById("stroj").style.display = "";
		}
		
		/*else if(action==3){
            document.getElementById("machine").style.display = "";
            document.getElementById("other").style.display = "none";
            document.getElementById("setting").style.display = "none";
			document.getElementById("jobid").style.display = "none";
            
        }*/
    };
	 function displayBox(){
        var action = document.getElementById("action_type").value;
        if(action==1){
            document.getElementById("set").style.display = "";
            document.getElementById("ine").style.display = "none";
        }/*else if(action==3){
            document.getElementById("set").style.display = "none";
            document.getElementById("fix").style.display = "";
            document.getElementById("ine").style.display = "none";
        }*/else if(action==4){
            document.getElementById("set").style.display = "none";
            document.getElementById("ine").style.display = "";
        }else{
			  document.getElementById("set").style.display = "";
            document.getElementById("ine").style.display = "";
		}
    };
    window.onload= function(){
		displayBox();
	};
	
	function fill_data(){
		var identifikacia_ulohy=document.getElementById("identifikacia_ulohy").value;
		var http = new XMLHttpRequest();
		var url = "http://srv-webreport.mkem.sk/domains/api/zoradovaci_praca.php";
		var params="item="+identifikacia_ulohy;
		http.open("POST", url, true);
   
   			//Send the proper header information along with the request
   			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   			http.onreadystatechange = function() {//Call a function when the state changes.
   			if(http.readyState == 4 && http.status == 200) {
				var response_ajax=http.responseText;
				 var jsonObj = JSON.parse(response_ajax);
   				document.getElementById("vp").value = jsonObj.vp;
				document.getElementById("q").value = jsonObj.prierez;
				document.getElementById("kontakt").value = jsonObj.kontakt;
   			}
   			}
   			http.send(params);
	}
	
	
	 var input = document.getElementById("identifikacia_ulohy");
            if (input) {
                input.addEventListener("keyup", function(event) {
                    if (event.keyCode === 13) {
                        event.preventDefault();
                        fill_data();
                    }
                });
            }
	  var actionType = document.getElementById("action_type");
            if (actionType) {
                actionType.addEventListener("change", function() {
                    displayMachines();
                    displayBox();
                });
            }
        });

</script>