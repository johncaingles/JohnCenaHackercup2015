<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Train Tracker</title>
        <?php $this->load->view('templates/head');?>

        <style type="text/css">
/*
            body{
                background-image: url('materials/img/welcBack.png');
                background-size: cover;
                background-position: center !important;
                background-repeat: no-repeat !important;
                background-attachment: fixed;
            }
*/
        </style>
        
        <script>
            $(document).ready(function() {
                $.material.init();
                
                $("#linesBtnWrapper > .btn").click(function(){
                    $("#linesBtnWrapper > .btn").removeClass("picked");
                    $(this).addClass("picked").fadeTo( "slow", 1);
                    $("#linesBtnWrapper > .btn:not('.picked')").fadeTo( "slow", 0.5 );
                });
            });
        </script>
    </head>
    <body>
        <div class="col-md-12" style="padding:0;margin:0;text-align:center;">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="linesBtnWrapper">
                    <a href="javascript:void(0)" class="btn btn-primary btn-raised" style="width:32%;">LRT 1</a>
                    <a href="javascript:void(0)" class="btn btn-primary btn-raised" style="width:32%;">LRT 2</a>
                    <a href="javascript:void(0)" class="btn btn-primary btn-raised" style="width:32%;">MRT</a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div
    </body>
</html>