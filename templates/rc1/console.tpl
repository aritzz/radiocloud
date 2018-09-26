
<div class="row">
    <div class="col-md-12" id="streams">
            Streamak kargatzen
         <br/><br/>
    </div>
    <div class="col-md-9">
       
        
        <!-- Tab hasiera -->
<div class="tab-base" id="add_console">
                                    <!--Nav Tabs-->
                                    <ul class="nav nav-tabs">
                       
                                        <li class="active">
                                            <a data-toggle="tab" href="#jingletab">Kuña/Kabezera</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#streamtab">Streaming</a>
                                        </li>
                                      
                                        <li>
                                            <a data-toggle="tab" href="#youtubetab">Youtube</a>
                                        </li>
                                    </ul>
                                    <!--Tabs Content-->
                                    <div class="tab-content">
                                        <div id="youtubetab" class="tab-pane fade">
                                            <h4 class="text-thin">Youtubeko bideoa gehitu</h4>
                                             <p>Idatz ezazu youtubeko bideoaren helbidea eta gehitu botoiari sakatu.</p>
                                            
                                            <div class="input-group mar-btm">
                                                <input type="text" placeholder="Idatzi helbidea" class="form-control" id="youtubeinput">
                                                <span class="input-group-btn">
                                                <button class="btn btn-danger btn-labeled fa fa-plus" onclick="add_youtube()" type="button">Gehitu</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="jingletab" class="tab-pane fade  active in">
                                            <h4 class="text-thin">Kuña/kabezera gehitu</h4>
                                            <form id="jingleupload" action="index.php?m=radiolive&c=console&AJAX_REQUEST=1&u=true" enctype="multipart/form-data" class="dropzone">
                                            <div class="dz-default dz-message">
                                                <div class="dz-icon icon-wrap icon-circle icon-wrap-md"> <i class="fa fa-cloud-upload fa-2x"></i> </div>
                                                <div>
                                                    <p class="dz-text">Utzi hemen fitxategia edo klik hautatzeko</p>
                                                    <p class="text-muted">Onartutako formatuak: MP3, OGG</p>
                                                </div>
                                            </div>
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                            </form>
                                             <div class="progress progress-striped progress-lg active" id="progresu_barra">
                                            <div id="progresu_barra_aldaketa" style="width: 0%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" role="progressbar" class="progress-bar progress-bar-primary">
                                                <span class="sr-only">%X igota</span>
                                            </div>
                                        </div>

                                        <div id="progresua_bukatuta" class="text-center padding-20">
<p>Aukeratu mota eta testua idatzi</p><br/>
       <div class="btn-group" data-toggle="buttons">
                                            <label onclick="update_type(1);" class="btn btn-warning active">
                                            <input  type="radio" name="options" id="option1"> Kuña
                                            </label>
                                            <label onclick="update_type(2);" class="btn btn-warning">
                                            <input  type="radio" name="options" id="option2" checked> Kabezera
                                            </label>
                                            
                                        </div>
                                            
                                           
                                            
                                            <p><br/></p>
    <input onkeyup="update_jingle()" id="igokuina" type="text" class="form-control" placeholder="Izena?" name="helbidea" value="">
                                            <br/>

                                           <i onclick="update_and_reset()" class="fa fa-refresh fa-5x"></i>

                                        </div>


                                        </div>
                                        <div id="streamtab" class="tab-pane fade">
                                            <h4 class="text-thin">Streaming bat gehitu</h4>
                                            <p>Idatz ezazu streamingaren helbidea eta gehitu botoiari sakatu.</p>
                                            
                                            <div class="input-group mar-btm">
                                                <input type="text" placeholder="Idatzi izena" class="form-control" id="streaminputname"><br/>
                                                <input type="text" placeholder="Idatzi helbidea" class="form-control" id="streaminput">
                                                <span class="input-group-btn">
                                                <button class="btn btn-danger btn-labeled fa fa-plus" onclick="add_stream()" type="button">Gehitu</button>
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
        <!-- Tab bukaera -->
        
    </div>
    <div class="col-md-3" style="text-align:right;"><button onclick="add_console();return false;" class="btn btn-success btn-labeled fa fa-headphones">Audio berria</button>
    </div>
</div>

<div class="row">
                            <div class="col-md-6 eq-box-md grid" >
                                <!--Panel with Header-->
                                <!--===================================================-->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button type="button" class="btn btn-danger btn-icon icon-lg fa fa-refresh" onclick="load_intros()"></button>
                                        <button type="button" class="btn btn-info btn-icon icon-lg fa fa-trash" onclick="intro_toggle()"></button>
                                        </div>
                                        <h3 class="panel-title">Kabezerak</h3>
                                    </div>
                                    <div class="panel-body" id="intros">
                                        <p>Kargatzen.</p>
                                        
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                        <button type="button" class="btn btn-danger btn-icon icon-lg fa fa-refresh" onclick="load_jingles()"></button>
                                        <button type="button" class="btn btn-info btn-icon icon-lg fa fa-trash" onclick="jingle_toggle()"></button>
                                        </div>
                                        <h3 class="panel-title">Kuñak</h3>
                                    </div>
                                    <div class="panel-body" id="jingles">
                                        <p>Kargatzen.</p>
                                        
                                    </div>
                                </div>
                                
                            </div>

<div class="col-md-6 eq-box-md grid">
                                <!--Panel with Header-->
                                <!--===================================================-->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button type="button" class="btn btn-danger btn-icon icon-lg fa fa-refresh" onclick="load_youtube()"></button>
                                            <button type="button" class="btn btn-info btn-icon icon-lg fa fa-trash" onclick="youtube_toggle()"></button>
                                        </div>
                                        <h3 class="panel-title">Youtube</h3>
                                    </div>
                                    <div class="panel-body" id="youtube-s">
                                        <p>Kargatzen.</p>
                                         <!--<div class="alert alert-success">
                                            <iframe width="100%" height="auto" src="http://www.youtube.com/embed/FKWwdQu6_ok" frameborder="0" allowfullscreen></iframe>
<p align="right">Ezabatu</p>

</div>-->
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                        <button type="button" class="btn btn-danger btn-icon icon-lg fa fa-refresh" onclick="load_stream()"></button>
                                        <button type="button" class="btn btn-info btn-icon icon-lg fa fa-trash" onclick="stream_toggle()"></button>
                                        </div>
                                        <h3 class="panel-title">Streamingak</h3>
                                    </div>
                                    <div class="panel-body" id="streamak">
                                        <p>Kargatzen.</p>
                                    </div>
                                </div>
                                
                            </div>
</div>

<script type="text/javascript">
var type=1;
    
function YoutubeGetURL(url){
  var ID = '';
  url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
  if(url[2] !== undefined) {
    ID = url[2].split(/[^0-9a-z_\-]/i);
    ID = ID[0];
  }
  else {
    ID = url;
  }
    return ID;
}
    
var colors =  ["success", "info", "warning", "danger", "dark", "mint"];

function jingle_toggle() {
    $(".jingled").toggle();
}
    
function intro_toggle() {
    $(".introd").toggle();
}
    
function youtube_toggle() {
    $(".youtubed").toggle();
}

function stream_toggle() {
    $(".streamakd").toggle();
}
    
function update_and_reset() {
    update_jingle();
    update_type(type);
    reset_all();
    $('#igokuina').val('');
    type = 1;
}
    
function reset_all() {
    $("#jingleupload").show();
    $("#progresu_barra").hide();
    $("#progresua_bukatuta").hide();
    load_jingles();
    load_intros();
  /*  load_youtube();
    load_stream();*/

}    

function add_stream() {
    $("#streaminput").val();
    $.ajax({
        method: "POST",
        url: "index.php?m=radiolive&c=console&AJAX_REQUEST=1&add=1",
        data: { name: $('#streaminputname').val(), url: $('#streaminput').val() }
    }).done(function( msg ) {
        $('#streaminputname').val('');
        $('#streaminput').val('');
        load_stream();
    });
}
    
function add_youtube() {
    $("#youtubeinput").val();
    $.ajax({
        method: "POST",
        url: "index.php?m=radiolive&c=console&AJAX_REQUEST=1&add=2",
        data: { name: YoutubeGetURL($('#youtubeinput').val()), url: YoutubeGetURL($('#youtubeinput').val()) }
    }).done(function( msg ) {
        $('#youtubeinput').val('');
        load_youtube();
    });
}
   
function update_type(modeid) {
    type = modeid;
    $.ajax({
        method: "POST",
        url: "index.php?m=radiolive&c=console&AJAX_REQUEST=1&update=2",
        data: { id: $('#igokuina').attr('name'), text: modeid }
    }).done(function( msg ) {
    });
}    
    
function update_jingle() {
    
    $.ajax({
        method: "POST",
        url: "index.php?m=radiolive&c=console&AJAX_REQUEST=1&update=1",
        data: { id: $('#igokuina').attr('name'), text: $('#igokuina').val() }
    }).done(function( msg ) {
    });
}
    
function play_jingle(id) {
    var audiofile = document.getElementById("jingle"+id);
    var buttonto = $("#jingleb"+id);

    audiofile.load();    
    audiofile.play();
    var ended = 0;
    
    audiofile.addEventListener("ended", function() {ended=1;}, false);
    
    (function pulse() {
        if (!ended) 
           $("#jingleb"+id).delay(10).fadeOut('fast').delay(5).fadeIn('fast', pulse); 
    })();
     
}
    
    
function load_jingles() {
    $("#jingles").empty();

$.getJSON( "index.php?m=radiolive&c=console&AJAX_REQUEST=1&type=jingle", function(data) {
    var cua = 0;
    var color=0;
    $.each(data, function(key,val) {
        if (cua == 0)
            $("#jingles").append("<div class=\"form-group\">");
        
        // Audio elementu berria
        audionew = document.createElement( "audio" );
        audionew.id = "jingle"+val.id;
        audionew.controls = "";
        audionew.src = "audio/"+val.file;
        audionew.type = "audio/mp3";
        

        // Beste div-ak
        $("#jingles").append(audionew);
        $("#jingles").append("<div class=\"col-md-4\" id=\"jinglec"+val.id+"\"><button onclick=\"del_jingle("+val.id+");\" class=\"btn btn-default btn-icon icon-lg fa fa-trash jingled\"></button><button id=\"jingleb"+val.id+"\"  class=\"btn btn-block btn-"+colors[color]+"\" onclick=\"play_jingle("+val.id+");\">"+val.name+"</button></div>");
        
        cua++;
        color++;
        if (cua == 3) {
            cua = 0;
            $("#jingles").append("</div><br/><br/>");
        }
        if (color == colors.length)
            color = 0;
    });
}).done(function() {
    $(".jingled").hide();
});
    
   
}
    
// Intro load
function load_intros() {
    $("#intros").empty();

$.getJSON( "index.php?m=radiolive&c=console&AJAX_REQUEST=1&type=intro", function(data) {
    var color=0;
    $.each(data, function(key,val) {
        intronew = document.createElement("div");
        intronew.id = 'introc'+val.id;
        intronew.className += 'alert alert-'+colors[color];
        titlenew = document.createElement("strong");
        titlenew.append(val.name);
        intronew.append(titlenew);
        
        // Audio elementu berria
        audionew = document.createElement("audio");
        audionew.id = "jingle"+val.id;
        audionew.controls = "controls";
        audionew.src = "audio/"+val.file;
        audionew.type = "audio/mp3";
        audionew.style = "width: 100%;";
        intronew.append(audionew);
        
        
        // Beste div-ak
        $("#intros").append(intronew);
        $('#introc'+val.id).append("<button onclick=\"del_intro("+val.id+");\" class=\"btn btn-default btn-icon icon-lg fa fa-trash introd\"></button>");
        
        color++;
        if (color == colors.length)
            color = 0;
    });
}).done(function() {
    $(".introd").hide();
});
    
   
}    
    
    
// Youtube load
function load_youtube() {
    $("#youtube-s").empty();

$.getJSON( "index.php?m=radiolive&c=console&AJAX_REQUEST=1&type=youtube", function(data) {
    var color=0;
    $.each(data, function(key,val) {
        intronew = document.createElement("div");
        intronew.id = 'youtubec'+val.id;
        intronew.className += 'alert alert-'+colors[color];
    
        // Bideo elementu berria
        framenew = document.createElement("iframe");
        framenew.width = "100%";
        framenew.height = "auto";
        framenew.src = "http://www.youtube.com/embed/"+val.file;
        
        intronew.append(framenew);
        
        // Beste div-ak
        $("#youtube-s").append(intronew);
        $('#youtubec'+val.id).append("<button onclick=\"del_youtube("+val.id+");\" class=\"btn btn-default btn-icon icon-lg fa fa-trash youtubed\"></button>");
        
        color++;
        if (color == colors.length)
            color = 0;
    });
}).done(function() {
    $(".youtubed").hide();
});
    
   
}    
    

    
// Stream load
function load_stream() {
    $("#streamak").empty();

$.getJSON( "index.php?m=radiolive&c=console&AJAX_REQUEST=1&type=stream", function(data) {
    var color=0;
    $.each(data, function(key,val) {
        intronew = document.createElement("div");
        intronew.id = 'streamakc'+val.id;
        intronew.className += 'alert alert-'+colors[color];
        titlenew = document.createElement("strong");
        titlenew.append(val.name);
        intronew.append(titlenew);
        
        // Audio elementu berria
        audionew = document.createElement("audio");
        audionew.id = "streamak"+val.id;
        audionew.controls = "controls";
        audionew.src = val.file;
        audionew.type = "audio/mp3";
        audionew.style = "width: 100%;";
        intronew.append(audionew);
        
        
        // Beste div-ak
        $("#streamak").append(intronew);
        $('#streamakc'+val.id).append("<button onclick=\"del_stream("+val.id+");\" class=\"btn btn-default btn-icon icon-lg fa fa-trash streamakd\"></button>");
        
        color++;
        if (color == colors.length)
            color = 0;
    });
}).done(function() {
    $(".streamakd").hide();
});
    
   
}  
    
    
function del_jingle(id)
{
    var request = $.ajax({
      url: "index.php?m=radiolive&c=console&AJAX_REQUEST=1&del=1",
      method: "POST",
      data: { remid : id },
      dataType: "html"
    });

    request.done(function( msg ) {
      $("#jinglec"+id).hide();
    });
    
}
    
function del_intro(id)
{
    var request = $.ajax({
      url: "index.php?m=radiolive&c=console&AJAX_REQUEST=1&del=1",
      method: "POST",
      data: { remid : id },
      dataType: "html"
    });

    request.done(function( msg ) {
      $("#introc"+id).hide();
    });
    
}
    
function del_stream(id)
{
    var request = $.ajax({
      url: "index.php?m=radiolive&c=console&AJAX_REQUEST=1&del=1",
      method: "POST",
      data: { remid : id },
      dataType: "html"
    });

    request.done(function( msg ) {
      $("#streamakc"+id).hide();
    });
    
}
    
function del_youtube(id)
{
    var request = $.ajax({
      url: "index.php?m=radiolive&c=console&AJAX_REQUEST=1&del=1",
      method: "POST",
      data: { remid : id },
      dataType: "html"
    });

    request.done(function( msg ) {
      $("#youtubec"+id).hide();
    });
    
}
    
function load_streams()
{
    var request = $.ajax({
      url: "index.php?m=radiolive&c=console&AJAX_REQUEST=1&streams=1",
      method: "POST",
      dataType: "html"
    });

    request.done(function( msg ) {
      $("#streams").html(msg + "<br/><br/>");
    });
    
}

function add_console() {
    $("#add_console").toggle(500);
}

setTimeout(load_stream, 500);
setTimeout(load_youtube, 500);
setTimeout(load_jingles, 500);
setTimeout(load_intros, 500);
setTimeout(load_streams, 500);

setInterval(load_streams, 15000);

</script>
