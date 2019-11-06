<?php
session_start();
if ($_SESSION == NULL) {
    header('location:login.php');
} else {
    include "koneksi.php";
    include "fungsi/fungsi_tanggal.php";
    include "fungsi/fungsi_library.php";
    include "fungsi/format_number.php";
    ?>
    <html lang="en">
        <head>
            <?php include "header.php"; ?>
        </head>

        <body>
            <!-- topbar starts -->
            <div class="navbar">
                <?php include "top.php"; ?>
            </div>
            <!-- topbar ends -->
            <div class="container-fluid">
                <div class="row-fluid">

                    <noscript>
                    <div class="alert alert-block span10">
                        <h4 class="alert-heading">Warning!</h4>
                        <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                    </div>
                    </noscript>

                    <div id="content" class="span10">
                        <!-- content starts -->
                        <?php include "konten.php"; ?>
                    </div><!--/#content.span10-->
                </div><!--/fluid-row-->

                <hr>

                

            </div><!--/.fluid-container-->

            <!-- external javascript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->

            <?php include "js.php"; ?>
            <script>
                $(function () {

                    $('.formatCurrency').blur(function() {
                        $('.formatCurrency').html(null);
                        $(this).formatCurrency({colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 2});
                    })

                    .keyup(function(e) {
                        var e = window.event || e;
                        var keyUnicode = e.charCode || e.keyCode;
                        if (e !== undefined) {
                            switch (keyUnicode) {
                                case 16:break; // Shift
                                case 17:break; // Ctrl
                                case 18:break; // Alt
                                case 27:this.value = '';break; // Esc: clear entry
                                case 35:break; // End
                                case 36:break; // Home
                                case 37:break; // cursor left
                                case 38:break; // cursor up
                                case 39:break; // cursor right
                                case 40:break; // cursor down
                                case 78:break; // N (Opera 9.63+ maps the "." from the number key section to the "N" key too!) (See: http://unixpapa.com/js/key.html search for ". Del")
                                case 110:break; // . number block (Opera 9.63+ maps the "." from the number block to the "N" key (78) !!!)
                                case 190:break; // .
                                default:$(this).formatCurrency({colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true});
                            }
                        }
                    });
    					
                    $("#id_pembelian").change(function(){
                        var id_beli = $(this).val(); 
                        //var item = $(this).parent(); //parent().paren... until you reach the element that you want to delete 
    						
                        if(id_beli!=""){
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: "pages/page_penjualan/hitung_hj.php?id="+id_beli,
                                cache: false,
                                success: function(data) {
                                    $("#harga_penjualan").val(data.hj);
                                }
                            });
                        }else{
                            alert('Silahkan pilih Motor');
                            $("#harga_penjualan").val('');
                        }
                    });
                                            
                    $("#id_merk").change(function() {
                        var idmerk = $(this).val();
                        $.ajax({
                            url : "pages/pages_jenis_motor/get_jenis_motor.php",
                            data : "idmerk=" + idmerk,
                            success : function(data) {
                                $("#id_jenis_motor").html(data);
                            }
                        });
                    });

                });

            </script>
            <script type="text/javascript">
    	
                $(document).ready ( function () 
                {
    					 
                    $('.default_datepicker').datepicker({
                        dateFormat : 'dd-mm-yy'
                    });
    					 
                    $('.monthyear_datepicker').datepicker({
                        dateFormat : 'yy/mm'
                    });
    					 
                    $('.yearmonth_datepicker').datepicker({
                        dateFormat : 'mm/yy'
                    });
    					
    					 
    					 
                });
            </script>

        </body>
    </html>
<?php } ?>
