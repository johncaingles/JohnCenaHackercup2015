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
/*
                background-image: url('materials/img/welcBack.png');
                background-size: cover;
                background-position: center !important;
                background-repeat: no-repeat !important;
                background-attachment: fixed;
*/
                background-color: #4e7c88;
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
                
                $("#checkBtn").click(function(){
                    
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
                        <div style="">Where are you going?</div>
                        <div class="col-md-12" style="padding:0;margin:0;margin-top:20px;">
                            <div class="form-group col-md-4" style="padding:0;margin:0;">
                                <div class="col-md-12">
                                    <select id="fromDD" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2" style="padding:0;margin:0;">to</div>
                            
                            <div class="form-group col-md-4" style="padding:0;margin:0;">
                                <div class="col-md-12">
                                    <select id="toDD" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div id="checkBtn" class="btn btn-primary btn-sm">Check</div>
                            </div>
                        </div>
                        
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
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        
    </body>
</html>