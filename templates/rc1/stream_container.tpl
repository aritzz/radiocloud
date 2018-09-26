<div class="panel">
                                    <div class="panel-heading">
                                        
                                        <h3 class="panel-title">Stream helbideak</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>Hona hemen streaming helbideak.</p>
                                        <form class="form-horizontal form-bordered">
                                            
                                            {{STREAM_CONTENT}}
                                            
                                        </form>
    </div>
</div>

<div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Stream berria gehitu</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                    	  <form class="panel-body form-horizontal" action="index.php?m=radiolive&c=stream" method="post">
                                        <!--Static-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Izena</label>
                                            <div class="col-md-9">
                                       			<!--<input id="demo-dp-txtinput" type="text" class="form-control">-->
                                       			<input type="text" name="izena" class="form-control" id="izena">


                                            </div>
                                        </div>
                                         <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">IP</label>
                                            <div class="col-md-9">
                                                <input type="text" name="ip" id="demo-text-input" class="form-control" placeholder="adibidez 219.22.11.1">
                                            </div>
                                        </div>
                                        <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Portua</label>
                                            <div class="col-md-9">
                                                <input type="text" name="port" id="demo-text-input" class="form-control" placeholder="adibidez 8000">
                                            </div>
                                        </div>
                                        <br/>
                                              
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Zerbitzari-mota</label>
                                                <div class="col-md-9">
                                                    <!-- Default Bootstrap Select -->
                                                    <!--===================================================-->
                                                    <select class="form-control selectpicker" name="type">
                                                        <option value="shoutcast">Shoutcast</option>
                                                        <option value="icecast">Icecast2</option>
                                                    </select>
                                                    <!--===================================================-->
                                                </div>
                                            </div>

<br/>

                                               <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Montatze puntua edo ID</label>
                                            <div class="col-md-9">
                                                <input type="text" name="mount" id="demo-text-input" class="form-control" placeholder="icecast irratia-online, shoutcast 1">
                                            </div>
                                        </div>
                                        <br/>
 <br/>
									 <div class="panel-footer text-right">
                                                <button class="btn btn-warning" type="submit">Ados</button>
                                            </div>





                                        </form>
                                    </div>
 </div>
