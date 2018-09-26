
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ku&ntilde;en zerrenda</h3>
                            </div>

<!-- Foo Table - Add & Remove Rows -->
                            <!--===================================================-->
                            <div class="panel-body">
        
                                <table id="music_collection" class="table table-bordered table-hover toggle-circle" data-page-size="15" data-filter="#demo-input-search2">
                                    <thead>
                                        <tr>
                                            <th data-sort-initial="true" data-toggle="true">Izena</th>
                                            <th>Mota</th>
                                            <th>Nondik hartu</th>
                                            <th>Modua</th>

					    <th data-hide="phone, tablet">Probabilitatea</th>
                                            <th data-hide="phone, tablet">Aktibo</th>
                                            <th>Aldatu</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                          {{JINGLES}}
                                       
                                        

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <div class="text-right">
                                                    <ul class="pagination"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

 </div>


<div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Ku&ntilde;a berria gehitu</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                    	  <form class="panel-body form-horizontal" action="index.php?m=radiocore&c=jingles" method="post">
                                        <!--Static-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Izena</label>
                                            <div class="col-md-9">
                                       			<input type="text" name="name" class="form-control" id="name">
                                            </div>
                                        </div>
                                         <br/>
                                        <!--Text Input-->
                                      <div class="form-group">
                                            <label class="control-label col-md-3">Mota</label>
                                            <div class="col-md-9">
                                                <!-- Default Bootstrap Select -->
                                                <!--===================================================-->
                                                <select class="form-control selectpicker" name="type">
                                                    <option value="beep">Orduen ostean erreproduzitu</option>
                                                    <option value="end">Programa bukatzeaz batera</option>
                                                    <option value="endp">Programa bukatzeaz batera probabilitatearekin</option>

                                                </select>
                                                <!--===================================================-->
                                            </div>
                                        </div>
                                        <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Probabilitatea</label>
                                            <div class="col-md-9">
                                                <!-- Default Bootstrap Select -->
                                                <!--===================================================-->
                                                <select class="form-control selectpicker" name="probability">
                                                    <option value="1">Beti</option>
                                                    <option value="2">Handia</option>
                                                    <option value="5">Ertaina</option>
                                                    <option value="7">Txikia</option>
                                                </select>
                                                <!--===================================================-->
                                            </div>
                                        </div>
                                        <br/>
                                              
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Modua</label>
                                                <div class="col-md-9">
                                                    <!-- Default Bootstrap Select -->
                                                    <!--===================================================-->
                                                    <select class="form-control selectpicker" name="mode">
                                                        <option value="RandomFile">Ausazko fitxategia karpetan</option>
                                                        <option value="File">Fitxategi bat</option>
                                                    </select>
                                                    <!--===================================================-->
                                                </div>
                                            </div>

<br/>

                                               <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Fitxategia edo karpeta</label>
                                            <div class="col-md-9">
                                                <input type="text" name="file" id="demo-text-input" class="form-control" placeholder="kuinak">
                                            </div>
                                        </div>
                                        <br/>
 <br/>
									 <div class="panel-footer text-right">
                                                <button class="btn btn-warning" type="submit">Gehitu</button>
                                            </div>





                                        </form>
                                    </div>
 </div>


<script type="text/javascript">

    function del_jingle(id) {
        $(location).attr('href', 'index.php?m=radiocore&c=jingles&delInstance='+id);
    }
    function toggle_jingle(id) {
        $(location).attr('href', 'index.php?m=radiocore&c=jingles&toggle='+id);
    }

    
</script>
