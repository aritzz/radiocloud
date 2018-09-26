

<div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        
                                         <div class="panel-control">
                                           
                                        <button onclick="garbitu_log(); return;" id="garbitu_log" class="btn btn-default  btn-labeled btn-icon fa-5x fa fa-times ">Loga garbitu</button>
                                     
                                           
                                        </div>
                                        <h3 class="panel-title">Logak</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <p>{{INFO}}</p>
                                    </div>
                                </div>


<script type="text/javascript">
function garbitu_log() {
    window.location = "index.php?m=configuration&c=logs&clean=1";
}

</script>