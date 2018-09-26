

<div class="row">
                            <div class="col-lg-3">
                                <div class="well">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Idatzi barra-kodea"  id="disc_search" autofocus>
                                        <div class="input-group-btn" >
                                            <button class="btn btn-info btn-md" type="button">Barra-kodea</button>
                                        </div>
                                    </div><br/>
                                     <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Idatzi diskoaren izena"  id="disc_name_search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-warning btn-md" type="button">Titulua</button>
                                        </div>
                                    </div>
                            
                                </div>
                                <div class="panel">
                                    <div class="panel-body">
    
                                    <!--    <h3 class="pad-all bord-btm text-thin">Technical</h3>-->
                                        <div id="demo-acc-technical" class="panel-group accordion">
                                            <!-- media panel object -->
                                            <div class="panel">
                                                <div class="panel-body">
                                     
<div id="disc_container"></div>
                                            </div>
                                            </div>
                                            <!-- end media panel object -->
  
                                        </div>
                                        <!--===================================================-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <i class="fa fa-circle-o fa-lg fa-fw text-primary"></i> Disko berria sartu bildumara
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                                    <div class="col-sm-6">
                                                        <p>Idatzi diskoari buruzko informazioa edo aukeratu diskoa ezkerreko bilatzailean.</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p align="right"><img alt="Karatula" id="disc_thumb" class="img-lg img-circle img-border mar-btm" src=""></p>
                                                    </div>
                                        </div>
                                        
                                       <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Taldea</label>
                                                            <input type="text" class="form-control" id="disc_artist">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Izenburua</label>
                                                            <input type="text" class="form-control" id="disc_title">
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Argitaletxea</label>
                                                            <input type="text" class="form-control" id="disc_label">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Urtea</label>
                                                            <input type="text" class="form-control" id="disc_year">
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Musika-estiloa (bat baino gehiago badaude, komaz separatu)</label>
                                            <input type="text" class="form-control" placeholder="elektronika, synth-pop" id="disc_genre">
                                        </div>
                                        <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Herrialdea</label>
                                                            <input type="text" class="form-control" id="disc_country">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Disko-mota</label>
                                                            <input type="text" class="form-control" placeholder="LP, Kaseta, CD" id="disc_format">
                                                        </div>
                                                    </div>
                                        </div>

                                         <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Karatularen URLa</label>
                                                            <input type="text" class="form-control" placeholder="http://www..." id="disc_thumb_url">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Barra-kodea</label>
                                                            <input type="text" class="form-control" id="disc_barcode">
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kokapena</label>
                                                            <input type="text" class="form-control" placeholder="4 estanterian..." id="disc_whereis">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Kopurua</label>
                                                            <input type="text" class="form-control" id="disc_copies" value="1">
                                                        </div>
                                                    </div>
                                        </div>
                                                                               

                                        <button class="btn btn-success pull-right" id="send_disc"><span class="fa fa-save" ></span> Gorde diskoa</button>
                                    </div>
                                </div>
                                  
                                <!--===================================================-->
                            </div>
                        </div>
<script>
    
    var delay = (function(){
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();
    var discogs_results;
    
    function Disc_Add(discid) {
        
        $("#disc_thumb").attr("src", discogs_results[discid].thumb);
        var artist = discogs_results[discid].title.split(" - ")[0];
        var title = discogs_results[discid].title.split(" - ")[1];

        $("#disc_artist").val(artist);
        $("#disc_title").val(title);
        $("#disc_label").val(discogs_results[discid].label[0]);
        $("#disc_year").val(discogs_results[discid].year);
        $("#disc_genre").val(discogs_results[discid].genre);
        $("#disc_format").val(discogs_results[discid].format[0]);
        $("#disc_thumb_url").val(discogs_results[discid].thumb);
        $("#disc_country").val(discogs_results[discid].country);
        $("#disc_barcode").val(input.value);



    }
    
    function Disc_Reset() {
        $("#disc_thumb").attr("src", "");
      
        $("#disc_artist").val("");
        $("#disc_title").val("");
        $("#disc_label").val("");
        $("#disc_year").val("");
        $("#disc_genre").val("");
        $("#disc_format").val("");
        $("#disc_thumb_url").val("");
        $("#disc_country").val("");
        $("#disc_search").val(""); 
        $("#disc_name_search").val(""); 
        $("#disc_barcode").val(""); 
        $("#disc_whereis").val("");
        $("#disc_copies").val(""); 
        $("#disc_search").focus();
    }

    
    function send_and_reset() {
         var posting = $.post( "index.php?m=radiocollection&c=berria&AJAX_REQUEST=1", { artist: $("#disc_artist").val(), title: $("#disc_title").val(), label: $("#disc_label").val(), year: $("#disc_year").val(), genre: $("#disc_genre").val(), format: $("#disc_format").val(), thumb: $("#disc_thumb_url").val(), country: $("#disc_country").val(), whereis: $("#disc_whereis").val(), copies: $("#disc_copies").val(), barcode: $("#disc_barcode").val() } );
        

          posting.done(function( data ) {
                   // console.debug(data);
                    Disc_Reset();
                    $("#disc_container").empty();
                    
          });
        
    }
    function search_discogs_delay(value, type)
    {
        delay(function(){
            search_discogs(value, type);
        }, 1000 );
    }
    function search_discogs(value, type) {
        
      //  alert("search" + value);
        
        if (value.length < 3) {
             $("#disc_container").empty(); return false;
        }
        
        if (type == 0) {
              if (isNaN(parseInt(value, 10))) return false;
              var APIURL = "https://api.discogs.com/database/search?barcode="+value+"&token={{TOKEN}}";
        } else {
              var APIURL = "https://api.discogs.com/database/search?title="+value+"&token={{TOKEN}}";
        }
  

      $.getJSON( APIURL, function( data ) {
          var items = [];
          var html = "";
          $("#disc_container").empty();
        
          discogs_results = Object.assign({}, data.results);

          $.each( data.results, function( discdata ) {
             //   console.debug(data.results[discdata].title);
            html = "";
            html +='<div class="media"><div class="media-left"><a href="#" onclick="Disc_Add('+discdata+');"><img class="media-object" data-src="holder.js/64x64" alt="64x64" src="'+data.results[discdata].thumb+'"></a></div>';
            html +='<div class="media-body"><h4 class="media-heading">'+data.results[discdata].title+' ('+ data.results[discdata].year+', '+data.results[discdata].format[0]+')</h4><b>Herrialdea</b>: '+data.results[discdata].country+' <br/><b>Argitaletxea</b>: '+data.results[discdata].label[0]+' <br/><b>Generoa</b>: '+data.results[discdata].genre.toString()+' </div></div>';
            $("#disc_container").append(html);
          });
  
    });
      
      
      
      
 
    }
  var input = document.getElementById('disc_search');
  input.addEventListener('keyup',function(){search_discogs_delay(input.value, 0)});
    
    var input2 = document.getElementById('disc_name_search');
  input2.addEventListener('keyup',function(){search_discogs_delay(input2.value, 1)});
   

 document.getElementById('send_disc').addEventListener('click', send_and_reset);

</script>