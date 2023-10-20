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
                                            <i class="fa fa-industry"></i> Typ
											</div>
                                      
                                    </div>
									
                                    <div class="portlet-body form">
									
									 
                                        <form class="form-horizontal" role="form" method="post" accept-charset="utf-8">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <div class="col-md-7">
                                                       Typ práce
                                                        <select name="action_type" class="form-control" onchange="displayMachines(); displayBox();" id="action_type">

                                                            <option value="1">Nastavenie</option>
                                                            <option value="3">Oprava</option>
                                                            <option value="4">Iné</option>

                                                        </select>	
                                                    </div>
												</div>
											</div>
									</div>
</div>
                                                
 <div class="portlet box blue  " id="set" style="display:none;">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-industry"></i> Nastavenie
											</div>
                                      
                                    </div>
									
                                    <div class="portlet-body form">
									<div id="jobid" style="padding:20px 20px 0px 20px">
                                                            Identifikácia úlohy
                                                           
															 
													<div class="input-group input-xlarge">
                                                       <input class="form-control" size="16" type="text" placeholder="Indentifikácia úlohy" name="identifikacia_ulohy" id="identifikacia_ulohy" style="">
                                                        <span class="input-group-btn">
                                                            <button class="btn blue" type="button" onclick="fill_data()">Vyplniť dáta</button>
                                                        </span>
                                                    </div>

									 </div>
									 
                                        <form class="form-horizontal" role="form" method="post" accept-charset="utf-8">
                                            <div class="form-body">
                                                <div class="form-group">
                                                   <div class="col-md-6">
                                                            Osobné číslo
                                                            <input class="form-control" size="16" type="number" placeholder="Osobné číslo" name="os_c" required min="1">
															<input class="form-control" size="16" type="hidden" placeholder="Osobné číslo" name="action_type" value="1"required min="1">

												    </div>
                                                  <div class="col-md-6">
                                                            Čas
                                                            <input class="form-control" size="16" type="text" placeholder="12:34" name="time" value="<?php echo $current_time;?>" required >

												    </div>
                                                   
                                                    <div id="setting" style="display:;">
                                                        <div class="col-md-6">
                                                            VP
                                                            <input class="form-control"  type="text" placeholder="VP" name="vp" id="vp" >
															
													    </div>
                                                        <div class="col-md-6">
                                                            Kontakt
                                                            <input class="form-control" size="16" type="text" placeholder="Kontakt" name="kontakt" id="kontakt">
													    </div> <br>
                                                       <div class="col-md-6">
                                                            Q
                                                            <input class="form-control" size="16" type="text" placeholder="Q" name="q" id="q">
													    </div>
														<div class="col-md-6">
                                                         <table class="table table-bordered">
														  <thead>
															<tr>
															  <th>A <small>(na začiatku prace)</small></th>
															  <th>E <small>(na konci práce)</small></th>
															  <th>S <small>(počas výroby)</small></th>
															  <th>K <small>(po oprave stroja)</small></th>
															</tr>
														  </thead>
														  <tbody>
															<tr>
															  <th><input size="30" type="radio" name="druh[]" value="A" style="width:20px; height:20px; margin-top:4%"></th>
															
															  <th><input size="30" type="radio" name="druh[]" value="E" style="width:20px; height:20px; margin-top:4%"></th>
														  
															  <td><input size="30" type="radio" name="druh[]" value="S" style="width:20px; height:20px; margin-top:4%"></td>
														 
															  <td><input size="30" type="radio" name="druh[]" value="K" style="width:20px; height:20px; margin-top:4%"></td>
															</tr>
														  </tbody>
														</table>
														</div>
														
														
                                                        
                                                      <div class="col-md-6">
                                                            N
                                                            <input class="form-control"  type="number" placeholder="Hodnota ťahovej skúšky" name="tahova" step="0.01">

													    </div>
                                                       <br><br><br>
                                                        <div class="col-md-6">
                                                            Vyhovuje
                                                            <input  size="30" type="radio" name="vyhovuje" value="1" style="width:20px; height:20px; margin-top:2%" checked>
                                                            Nevyhovuje
                                                            <input  size="30" type="radio" name="vyhovuje" value="0" style="width:20px; height:20px; margin-top:2%">

													    </div>
														 <div class="col-md-6">
                                                            Malá zakázka
                                                            <input  size="30" type="checkbox" name="small_order" value="1" style="width:20px; height:20px; margin-top:2%">

													    </div>
														<br>
                                                    </div>
												</div>                                              
                                            </div>
                                            <br><br><br><br><br><br><br><br><br>
                                                <div class="form-actions right1">
                                                   <button type="submit" class="btn blue" name="set_work">Zapísať prácu</button>
                                                </div>
                                                  
                                        </form>
                                    </div>
                                </div>        

 <div class="portlet box blue " id="fix" style="display:none;">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-industry"></i> Oprava
											</div>
                                      
                                    </div>
									
                                    <div class="portlet-body form">
									 
                                        <form class="form-horizontal" role="form" method="post" accept-charset="utf-8">
                                            <div class="form-body">
                                                <div class="form-group">
                                                   
                                                   <div class="col-md-6">
                                                            Osobné číslo
                                                            <input class="form-control" size="16" type="number" placeholder="Osobné číslo" name="os_c" required min="1">

												    </div>
                                                  <div class="col-md-6">
                                                            Čas
                                                            <input class="form-control" size="16" type="text" placeholder="12:34" name="time" value="<?php echo $current_time;?>" required >

												    </div>
                                                   
                                                    <div class="col-md-7" id="machine" style="display:block;"><br>
                                                    Číslo stroja:
                                                    <input class="form-control" size="16" type="number" id="machine"  name="machine">
													<input class="form-control" size="16" type="hidden"   name="action_type" value="3">
                                                    </div><br>
                                                    
                                                </div>                                              
                                            </div>
                                            
                                                <div class="form-actions right1">
                                                   <button type="submit" class="btn blue" name="set_work">Zapísať prácu</button>
                                                </div>
                                                
                                                
                                                
                                        </form>
                                    </div>
                                </div>        
<div class="portlet box blue " id="ine" style="display:none;">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-industry"></i> Ine
											</div>
                                      
                                    </div>
									
                                    <div class="portlet-body form">
									 
                                        <form class="form-horizontal" role="form" method="post" accept-charset="utf-8">
                                            <div class="form-body">
                                                <div class="form-group">
                                                   
                                                   <div class="col-md-6">
                                                            Osobné číslo
                                                            <input class="form-control" size="16" type="number" placeholder="Osobné číslo" name="os_c" required min="1">
															<input class="form-control" size="16" type="hidden"   name="action_type" value="4">

												    </div>
                                                  <div class="col-md-6">
                                                            Čas
                                                            <input class="form-control" size="16" type="text" placeholder="12:34" name="time" value="<?php echo $current_time;?>" required >
															
                                                    </div>
													<br>
                                                    
                                                    <div id="other" style="display:none;">
                                                        <div class="col-md-7">
                                                           Typ práce (Iné)
                                                            <select name="action_type_other" class="form-control" >
                                                                
                                                                <option value="0" selected>Vyberte typ práce</option>
                                                                <option value="1">Údržba</option>
                                                                <option value="2">Manipulácia</option>
                                                                <option value="3">Oprava kusov</option>
                                                                <option value="4">Oprava iného stroja</option>

                                                            </select>	
                                                        </div>
                                                        <div class="col-md-7">
                                                            Poznámka
                                                            <textarea class="form-control" name="note" id="" cols="30" rows="10"></textarea>

													    </div>
                                                    </div>
                                                </div>                                              
                                            </div>
                                            
                                                <div class="form-actions right1">
                                                   <button type="submit" class="btn blue" name="set_work">Zapísať prácu</button>
                                                </div>
                                                
                                                
                                                
                                        </form>
                                    </div>
                                </div>                

						
 </div>
<script>

    function displayMachines(){
        var action = document.getElementById("action_type").value;
        if(action==1){
            document.getElementById("machine").style.display = "";
            document.getElementById("other").style.display = "none";
            document.getElementById("setting").style.display = "";
			document.getElementById("jobid").style.display = "";
        }else if(action==2){
            document.getElementById("machine").style.display = "";
            document.getElementById("other").style.display = "none";
            document.getElementById("setting").style.display = "none";
			document.getElementById("jobid").style.display = "none";
        }else if(action==3){
            document.getElementById("machine").style.display = "";
            document.getElementById("other").style.display = "none";
            document.getElementById("setting").style.display = "none";
			document.getElementById("jobid").style.display = "none";
            
        }else{
            document.getElementById("setting").style.display = "none";
            document.getElementById("machine").style.display = "none";
            document.getElementById("other").style.display = "";
			document.getElementById("jobid").style.display = "none";
            
        }
    };
	 function displayBox(){
        var action = document.getElementById("action_type").value;
        if(action==1){
            document.getElementById("set").style.display = "";
            document.getElementById("fix").style.display = "none";
            document.getElementById("ine").style.display = "none";
        }else if(action==3){
            document.getElementById("set").style.display = "none";
            document.getElementById("fix").style.display = "";
            document.getElementById("ine").style.display = "none";
        }else if(action==4){
            document.getElementById("set").style.display = "none";
            document.getElementById("fix").style.display = "none";
            document.getElementById("ine").style.display = "";
        }else{
			  document.getElementById("set").style.display = "";
            document.getElementById("fix").style.display = "none";
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
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   fill_data();
  }
});
</script>