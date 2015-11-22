<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Train Tracker</title>
        <?php $this->load->view('templates/head');?>

        <style type="text/css">
            body{
                background-image: url('<?php echo base_url();?>materials/img/welcBack.png');
                background-size: cover;
                background-position: center !important;
                background-repeat: no-repeat !important;
                background-attachment: fixed;
/*                background-color: #4e7c88;*/
            }
            #loadI::-webkit-inner-spin-button, 
            #loadI::-webkit-outer-spin-button { 
              -webkit-appearance: none; 
              margin: 0; 
            }

        </style>
        
        <script>
            $(document).ready(function() {
                $.material.init();
                
                $("#linesBtnWrapper > .btn").click(function(){
                    $("#linesBtnWrapper > .btn").removeClass("picked");
                    $(this).addClass("picked").fadeTo( "slow", 1);
                    $("#linesBtnWrapper > .btn:not('.picked')").fadeTo( "slow", 0.5 );
                    
                    $("#welcomeWrapper").animate({ "margin-top": "20px"}, {queue:false});
                    $("#title").animate({"height": "15vmin"}, {queue:false});
                    $("#linesBtnWrapper > .btn").animate({"height": "10vmin"}, {queue:false});
                    $("#linesBtnWrapper > .btn > div").animate({"margin-top": "5%", "font-size" : "4vmin"}, {queue:false});
                    $("#btnRow").animate({"top": "10px"}, function(){
                        $("#afterCont").slideDown();
                    });
                    
                });
                
                $("#optsBtns > .btn").click(function(){
                    $("#optsBtns > .btn").removeClass("active");
                    $(this).addClass("active");
                });
                
                $("#siCB").change(function(){
                    if($("#siCB option:selected").text() == "Nothing"){
                        $("#siWrapper").slideUp();
                    }else{
                        $("#siWrapper").slideDown();
                    }
                });
            });
        </script>
    </head>
    <body>
<!--
        <div class="col-md-12" style="padding:0;margin:0;text-align:center;">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="linesBtnWrapper">
                    <a href="javascript:void(0)" class="btn btn-primary btn-raised" style="width:32%;">LRT 1</a>
                    <a href="javascript:void(0)" class="btn btn-primary btn-raised" style="width:32%;">LRT 2</a>
                    <a href="javascript:void(0)" class="btn btn-primary btn-raised" style="width:32%;">MRT</a>
                </div>
                
                <div style="font-family:'droidserif';font-size:6vmin;">
                    Where are you going?
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
-->
        <div class="col-md-12" style="padding:0;margin:0;text-align:center;margin-top:10%;" id="welcomeWrapper">
            <img id="title" src="<?php echo base_url();?>materials/img/t2.png" style="height:30vmin;width:auto;">
            <div id="btnRow" class="col-md-12" style="top:30px;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div id="linesBtnWrapper">
                        <div href="javascript:void(0)" class="btn btn-material-light-blue-300 btn-primary btn-raised" style="width:30%;height:20vh;"><div style="font-family:'lora';font-size:5vmin;margin-top:28%;">LRT 1</div></div>
                        <div href="javascript:void(0)" class="btn btn-material-light-blue-300 btn-primary btn-raised" style="width:30%;height:20vh;"><div style="font-family:'lora';font-size:5vmin;margin-top:28%;">LRT 2</div></div>
                        <div href="javascript:void(0)" class="btn btn-material-light-blue-300 btn-primary btn-raised" style="width:30%;height:20vh;"><div style="font-family:'lora';font-size:5vmin;margin-top:28%;">MRT</div></div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        
        <div class="col-md-12" style="padding:0;margin:0;text-align:center;margin-top:20px;display:none;" id="afterCont">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                          <li class="col-md-4 active" style="padding:0;"><a href="#homeT" data-toggle="tab">Load</a></li>
                          <li class="col-md-4" style="padding:0;"><a href="#siT" data-toggle="tab">Safety Incident</a></li>
                          <li class="col-md-4" style="padding:0;"><a href="#tmT" data-toggle="tab">Train Management</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content" style="margin-bottom:20px;">
                          <div class="tab-pane fade active in" id="homeT">
                              <input type="number" class="form-control" value="1" id="loadI" min="0" style="text-align:center;display:inline-block;width:400px;">
                          </div>
                          <div class="tab-pane fade" id="siT">
                            <select id="siCB" class="form-control" style="text-align:center;display:inline-block;width:500px;">
                                <option>Nothing</option>
                                <option>Train Collision</option>
                                <option>Derailment</option>
                                <option>Rail Crossing</option>
                                <option>Corporal Accident</option>
                                <option>Suicide Intent</option>
                                <option>Dragging</option>
                                <option>Door Pinning</option>
                            </select>
                              
                            <div class="col-md-12" style="padding:0;margin:0;display:none;" id="siWrapper">
                                <div class="form-group col-md-12" style="margin-top:20px;">
                                  <div class="col-md-2"></div>
                                  <label for="casualtyTB" class="col-md-2 control-label">Casualties</label>
                                  <div class="col-md-6">
                                    <input type="number" class="form-control" id="casualtyTB" placeholder="number">
                                  </div>
                                  <div class="col-md-2"></div>
                                </div>

                                <div class="form-group col-md-12" style="margin-top:20px;">
                                  <div class="col-md-2"></div>
                                  <label for="injuryTB" class="col-md-2 control-label">Injuries</label>
                                  <div class="col-md-6">
                                    <input type="number" class="form-control" id="injuryTB" placeholder="number">
                                  </div>
                                  <div class="col-md-2"></div>
                                </div>

                                <div class="form-group col-md-12" style="margin-top:20px;">
                                  <div class="col-md-2"></div>
                                  <label for="fatalTB" class="col-md-2 control-label">Fatalities</label>
                                  <div class="col-md-6">
                                    <input type="number" class="form-control" id="fatalTB" placeholder="number">
                                  </div>
                                  <div class="col-md-2"></div>
                                </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="tmT">
                            <div class="col-md-12">
                                <div class="col-md-12" style="text-align:center;">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3" style="margin:0;padding:0;margin-top:6px;">Train 1</div>
                                    <div class="col-md-8">
                                        <select id="t1TB" class="form-control" style="text-align:center;display:inline-block;width:200px;">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                            <option>Maintenance</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="col-md-12">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3" style="margin:0;padding:0;margin-top:6px;">Train 2</div>
                                    <div class="col-md-8">
                                        <select id="t2TB" class="form-control" style="text-align:center;display:inline-block;width:200px;">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                            <option>Maintenance</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3" style="margin:0;padding:0;margin-top:6px;">Train 3</div>
                                    <div class="col-md-8">
                                        <select id="t3TB" class="form-control" style="text-align:center;display:inline-block;width:200px;">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                            <option>Maintenance</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3" style="margin:0;padding:0;margin-top:6px;">Train 4</div>
                                    <div class="col-md-8">
                                        <select id="t4TB" class="form-control" style="text-align:center;display:inline-block;width:200px;">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                            <option>Maintenance</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3" style="margin:0;padding:0;margin-top:6px;">Train 5</div>
                                    <div class="col-md-8">
                                        <select id="t5TB" class="form-control" style="text-align:center;display:inline-block;width:200px;">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                            <option>Maintenance</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                          </div>
                        </div>
                            Time: <input type="number" class="form-control" value="1" id="time" min="1" max="12" style="text-align:center;display:inline-block;width:40px;">:00
                        <select id="timeM" class="form-control" style="text-align:center;display:inline-block;width:50px;">
                            <option>AM</option>
                            <option>PM</option>
                        </select>
                        <div class="col-md-12" style="text-align:center;">
                            <a href="javascript:void(0)" class="btn btn-primary btn-lg">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        
    </body>
</html>