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
                background-image: url('materials/img/welcBack.png');
                background-size: cover;
                background-position: center !important;
                background-repeat: no-repeat !important;
                background-attachment: fixed;
/*                background-color: #4e7c88;*/
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
                    
                    $("#alerts .alert").hide();
                });
                
                $("#checkBtn").click(function(){
                    var hour = new Date().getHours();
                    $("#alerts .alert").hide();
                    if($("#linesBtnWrapper > .btn.picked > div").text() == 'LRT 1'){
                        $.ajax({
                            type: 'post',
                            data: {"hour" : hour},
                            url: 'Welcome/checkIncident1',
                            dataType: "json",
                            beforeSend: function(){
                                $("#loadingGif").fadeIn();
                            },
                            success: function (data) {
                                $("#loadingGif").delay(1000).fadeOut(1000, function(){
                                   var flag = true;
                                    var problems = "";
                                    for (var key in data[0]){
                                        if (data[0].hasOwnProperty(key) && key != 'id' && key != 'time') {
                                            if(parseInt(data[0][key]) > 0){
                                                flag = false;
                                                problems += key + "<br>";
                                            }
                                        }
                                    }
                                    if(!flag){
                                        $("#alerts > .alert-danger").html("You cannot ride the train because of the following problems:<br> " + problems);
                                        $("#alerts > .alert-danger").fadeIn();
                                    }else{
                                        $("#alerts > .alert-success").html("You can ride the train with ease!");
                                        $("#alerts > .alert-success").fadeIn();
                                    } 
                                });
                            }
                        });
                    }else if($("#linesBtnWrapper > .btn.picked > div").text() == 'LRT 2'){
                        $.ajax({
                            type: 'post',
                            data: {"hour" : hour},
                            url: 'Welcome/checkIncident2',
                            dataType: "json",
                            beforeSend: function(){
                                $("#loadingGif").fadeIn();
                            },
                            success: function (data) {
                                $("#loadingGif").delay(1000).fadeOut(1000, function(){
                                   var flag = true;
                                    var problems = "";
                                    for (var key in data[0]){
                                        if (data[0].hasOwnProperty(key) && key != 'id' && key != 'time') {
                                            if(parseInt(data[0][key]) > 0){
                                                flag = false;
                                                problems += key + "<br>";
                                            }
                                        }
                                    }
                                    if(!flag){
                                        $("#alerts > .alert-danger").html("You cannot ride the train because of the following problems:<br> " + problems);
                                        $("#alerts > .alert-danger").fadeIn();
                                    }else{
                                        $("#alerts > .alert-success").html("You can ride the train with ease!");
                                        $("#alerts > .alert-success").fadeIn();
                                    } 
                                });
                            }
                        });
                    }else{
                        $.ajax({
                            type: 'post',
                            data: {"from" : $("#fromDD").val(),"hour" : hour},
                            url: 'Welcome/isPeakHour',
                            dataType: "json",
                            beforeSend: function(){
                                $("#loadingGif").fadeIn();
                            },
                            success: function (data) {
                                $("#loadingGif").delay(3000).fadeOut(function(){
                                   if(data[0][$("#fromDD").val()] > 150){
                                        $("#alerts > .alert-warning > p").html("You can ride the train but there is a large amount of people waiting in the platform right now.<br>As of " + hour + ":00 there are " + data[0][$("#fromDD").val()] + " number of people waiting on the platform.");
                                        $("#alerts > .alert-warning").fadeIn();
                                    }else if(false){

                                    }else{
                                        $("#alerts > .alert-success").html("You can ride the train with ease!");
                                        $("#alerts > .alert-success").fadeIn();
                                    } 
                                });
                            }
                        });
                    }
                });
                
                $("#graphHeader").click(function(){
                    $("#graphBody").slideToggle();
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
                        <div style="font-family:lobstertwo;font-size:5vmin;">Where are you going?</div>
                        <div class="col-md-12" style="padding:0;margin:0;margin-top:20px;">
                            <div class="form-group col-md-4" style="padding:0;margin:0;">
                                <div class="col-md-12">
                                    <select id="fromDD" class="form-control">
                                        <option value="north_avenue">North Avenue</option>
                                        <option value="quezon_avenue">Quezon Avenue</option>
                                        <option value="gma_kamuning">GMA Kamuning</option>
                                        <option value="araneta_center_cubao">Araneta Center Cubao</option>
                                        <option value="santolan">Santolan</option>
                                        <option value="ortigas">Ortigas</option>
                                        <option value="shaw_boulevard">Shaw Boulevard</option>
                                        <option value="boni">Boni</option>
                                        <option value="guadalupe">Guadalupe</option>
                                        <option value="buendia">Buendia</option>
                                        <option value="ayala">Ayala</option>
                                        <option value="magallanes">Magallanes</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2" style="padding:0;margin:0;">to</div>
                            
                            <div class="form-group col-md-4" style="padding:0;margin:0;">
                                <div class="col-md-12">
                                    <select id="toDD" class="form-control">
                                        <option value="north_avenue">North Avenue</option>
                                        <option value="quezon_avenue">Quezon Avenue</option>
                                        <option value="gma_kamuning">GMA Kamuning</option>
                                        <option value="araneta_center_cubao">Araneta Center Cubao</option>
                                        <option value="santolan">Santolan</option>
                                        <option value="ortigas">Ortigas</option>
                                        <option value="shaw_boulevard">Shaw Boulevard</option>
                                        <option value="boni">Boni</option>
                                        <option value="guadalupe">Guadalupe</option>
                                        <option value="buendia">Buendia</option>
                                        <option value="ayala">Ayala</option>
                                        <option value="magallanes">Magallanes</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div id="checkBtn" class="btn btn-primary btn-sm">Check</div>
                            </div>
                        </div>
                        
                        <div id="alerts">
                            <div class="alert alert-success col-md-12" style="display:none;">
                                <strong>Well done!</strong> You successfully read
                                <a href="javascript:void(0)" class="alert-link">this important alert message</a>.
                            </div>
                            <div class="alert alert-danger col-md-12" style="display:none;">
                                <strong>Oh snap!</strong>
                                <a href="javascript:void(0)" class="alert-link">Change a few things up</a> and try submitting again.
                            </div>
                            <div class="alert alert-warning col-md-12" style="display:none;">
                                <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna,
                                    <a href="javascript:void(0)" class="alert-link">vel scelerisque nisl consectetur et</a>.
                                </p>
                            </div>
                        </div>
                        
                        <div id="loadingGif" class="col-md-12" style="text-align:center;display:none;">
                            <img src="<?php echo base_url();?>materials/img/loadingGif.gif" width="120vw">
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                  <div class="panel-heading" style="cursor:pointer;" id="graphHeader">
                    <span class="mdi-navigation-expand-more" style="float:left;"></span>
                    <h3 class="panel-title">Stations/Platforms Statuses</h3>
                  </div>
                  <div class="panel-body" style="display:none;" id="graphBody">
                    <img src="<?php echo base_url();?>materials/img/graph.jpg" width="100%">
                  </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        
    </body>
</html>