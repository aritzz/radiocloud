

<div class="row">
                            <div class="col-lg-12">
                            <p align="center"><img src="img/radiocloud_logo.png" /></div></p>
                            </div>
<br/>
 <div class="panel">
<div class="panel-heading">
                                        <h3 class="panel-title">Datubasearen instalazioa</h3>
                                    </div>


 <div class="panel-body">
Sor ezazu datubase berri bat. Ondoren, idatzi identifikaziorako datuak eta sistemak automatikoki sortuko ditu behar dituen taulak eta gainerako informazioa.

                            </div>

</div>


 <div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datubasea instalatu</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
    
<form class="panel-body form-horizontal" action="#" method="post">
                                        <!--Static-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Zerbitzaria</label>
                                            <div class="col-md-9">
                                       			<input type="text" name="host" class="form-control" id="host" placeholder="adibidez localhost">
                                            </div>
                                        </div>
                                         <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="database">Datubasearen izena</label>
                                            <div class="col-md-9">
                                                <input type="text" name="database" id="database" class="form-control" placeholder="radiocloud">
                                            </div>
                                        </div>
                                        <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="user">Erabiltzailea</label>
                                            <div class="col-md-9">
                                                <input type="text" name="user" id="user" class="form-control" placeholder="pepito">
                                            </div>
                                        </div>
                                        <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="pass">Pasahitza</label>
                                            <div class="col-md-9">
                                                <input type="password" name="pass" id="pass" class="form-control">
                                            </div>
                                        </div>
                                        <br/>
                                              
                                       
                                        <br/>
 <br/>
									 <div class="panel-footer text-right">
                                                <button type="button" onclick="send_data(); return;" class="btn btn-info" type="submit">Instalatu datubasea</button>
                                            </div>

		 <div class="panel-footer text-center" id="dbinstall">
                                            </div>




                                        </form>
                                    </div>
 </div>

<script type="text/javascript">

    function send_data() {
        $.post( "install.php?step=1", { host: $( "#host" ).val(), database: $( "#database" ).val(), user: $( "#user" ).val(), pass: $( "#pass" ).val()})
        .done(function( data ) {
            $( "#dbinstall" ).html(data);
        }); 
    }
</script>

 

