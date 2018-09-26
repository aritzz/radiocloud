<div class="panel">
                                    <div class="panel-heading">
                                        
                                        <h3 class="panel-title">Oharren zerrenda</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>Hona hemen oharren zerrenda.</p>
                                        <form class="form-horizontal form-bordered">
                                            
                                            {{STREAM_CONTENT}}
                                            
                                        </form>
    </div>
</div>

<div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Oharra gehitu</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                    	  <form class="panel-body form-horizontal" action="index.php?m=configuration&c=notes" method="post">
                                        <!--Static-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Titulua</label>
                                            <div class="col-md-9">
                                       			<input type="text" name="titulua" class="form-control" id="titulua">
                                            </div>
                                        </div>
                                         <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Testua</label>
                                            <div class="col-md-9">
                                                <textarea id="editorea" name="testua" rows="4" cols="50"></textarea>
                                            </div>
                                        </div>
                                        <br/>
                                        
                                        <br/>
 <br/>
									 <div class="panel-footer text-right">
                                                <button class="btn btn-warning" type="submit">Ados</button>
                                            </div>





                                        </form>
                                    </div>
 </div>
