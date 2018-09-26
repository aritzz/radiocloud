

<div class="row">
                            <div class="col-lg-12">
                            <p align="center"><img src="img/radiocloud_logo.png" /></div></p>
                            </div>
<br/>
 <div class="panel">
<div class="panel-heading">
                                        <h3 class="panel-title">Softwarearen konfigurazioa</h3>
                                    </div>


 <div class="panel-body">
Jada datubasea instalatuta dago. Orain, softwarea konfiguratuko dugu. Bete ezazu formularioa zure datuekin
                            </div>

</div>


 <div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Konfigurazioa</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
    
<form class="panel-body form-horizontal" action="#" method="post">
                                        <!--Static-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Irratiaren izena</label>
                                            <div class="col-md-9">
                                       			<input type="text" name="name" class="form-control" id="name" placeholder="adibidez Radixu irratia">
                                            </div>
                                        </div>
                                         <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="slogan">Slogana</label>
                                            <div class="col-md-9">
                                                <input type="text" name="slogan" id="slogan" class="form-control" placeholder="Ondarruko irrati librea">
                                            </div>
                                        </div>
                                        <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="radiocore_dir">Radiocore direktorioa (audioak gordeko diren karpeta)</label>
                                            <div class="col-md-9">
                                                <input type="text" name="radiocore_dir" id="radiocore_dir" class="form-control" placeholder="/home/radiocore/media">
                                            </div>
                                        </div>
                                        <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="radiocloud_dir">RadioCloud direktorioa</label>
                                            <div class="col-md-9">
                                                <input type="text" name="radiocloud_dir" id="radiocloud_dir" class="form-control" value="{{RADIOCLOUD_DIR}}">
                                            </div>
                                        </div>
                                        <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="audio_format">Audioen formatua (mp3 edo ogg)</label>
                                            <div class="col-md-9">
                                                <input type="text" name="audio_format" id="audio_format" class="form-control" placeholder="mp3, ogg">
                                            </div>
                                        </div>
                                        <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="audio_quality">Audioen kalitatea (kbps-tan)</label>
                                            <div class="col-md-9">
                                                <input type="text" name="audio_quality" id="audio_quality" class="form-control" placeholder="32, 64, 128, 192, 256, 320">
                                            </div>
                                        </div>
                                        <br/>
                                              
                                       
                                        <br/>
 <br/>
									 <div class="panel-footer text-right">
                                                <button type="button" onclick="send_data(); return;" class="btn btn-info" type="submit">Konfigurazioa eguneratu</button>
                                            </div>

		 <div class="panel-footer text-center" id="configupdate">
                                            </div>




                                        </form>
                                    </div>
 </div>

<script type="text/javascript">

    function send_data() {
        $.post( "install.php?step=2", { name: $( "#name" ).val(), slogan: $( "#slogan" ).val(), radiocore_dir: $( "#radiocore_dir" ).val(), radiocloud_dir: $( "#radiocloud_dir" ).val(), audio_format: $( "#audio_format" ).val(), audio_quality: $( "#audio_quality" ).val()})
        .done(function( data ) {
            $( "#configupdate" ).html(data);
        }); 
    }
</script>

 

