
<li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i class="fa  animated-hover  faa-shake fa-headphones fa-lg"></i> <span class="badge badge-header badge-danger"></span> </a>
                                <!--Notification dropdown menu-->
                                <div class="dropdown-menu dropdown-menu-md with-arrow">
                                    <div class="pad-all bord-btm">
                                        <div class="h4 text-muted text-thin mar-no"> Emisioak </div>
                                    </div>
                                    
                                   <ul class="head-list" id="instances_refresh">
                                           {{INSTANCES}}
                                             
                                              </ul>
                                        
                                       
                                     
                                   
                                </div>    
    </li>
<script type="text/javascript">
function load_players()
{
    var request = $.ajax({
      url: "index.php?getradio=1",
      method: "POST",
      dataType: "html"
    });

    request.done(function( msg ) {
      $("#instances_refresh").html(msg);
    });
    
}



setInterval(load_players, 15000);

</script>