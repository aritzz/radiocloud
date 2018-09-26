                                    <div class="panel">
                                        <div class="panel-heading">
                                            
                                            <h3 class="panel-title">Gehitu blokea</h3>
                                        </div>
                                        <!--Horizontal Form-->
                                        <!--===================================================-->
                                        <form class="form-horizontal" method="post">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Blokearen izena</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Idatzi bloke-mota berriaren izena" name="izena" class="form-control">
                                                    </div>
                                                </div>
                                               <div class="form-group">

                                                    <label class="control-label col-sm-3">Taldea</label>
                                                <div class="col-sm-9">
                                                    <!-- Default Bootstrap Select -->
                                                    <!--===================================================-->
                                                    <select  name="taldea" class="form-control selectpicker">
                                                        {{BLOCK_GROUPS}}
                                                    </select>
                                                    <!--===================================================-->
                                                </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3">Mota</label>
                                                <div class="col-sm-9">
                                                  <!--  <div class="radio">
                                                        <label class="form-radio form-icon active">
                                                        <input type="radio" checked="" name="mota" value="File">Fitxategia</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="form-radio form-icon">
                                                        <input type="radio" name="mota"  value="File">Streaming</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="form-radio form-icon">
                                                        <input type="radio" name="mota"  value="Randomfile">Fitxategi bat ausaz (Random file)</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="form-radio form-icon">
                                                        <input type="radio" name="mota" value="Random">Ausazko fitxategiak (Random dir)</label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="form-radio form-icon">
                                                        <input type="radio" name="mota" value="Interleave">Tartekaria (**DOKUMENTAZIOA IKUSI**)</label>
                                                    </div>-->



                                        <select class="form-control selectpicker" name="mota">
                                                            <option value="File">Fitxategia</option>
                                                            <option value="File">Streaming</option>
                                                            <option value="RandomFile">Ausazko fitxategi bat</option>
                                                            <option value="Random">Ausaz (direktorioa)</option>
                                                            <option value="Interleave">Tartekaria (**DOKUMENTAZIOA IKUSI**)</option>

                                                     </select>






                                                    <!-- Default Bootstrap Select -->
                                                    <!--===================================================-->
                                                  <!-- <select class="form-control selectpicker" name="mota">
                                                            <option id="File">Fitxategia</option>
                                                            <option id="File">Streaming</option>
                                                            <option id="RandomFile">Ausazko fitxategi bat</option>
                                                            <option id="Random">Ausaz (direktorioa)</option>
                                                            <option id="Interleave">Tartekaria (**DOKUMENTAZIOA IKUSI**)</option>

                                                     </select>-->
                                                    <!--===================================================-->
                                                </div>
                                                </div>
                                                
                                                <div class="form-group">


                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Helbidea</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="URL/direktorioa/fitxategia/..." name="helbidea" class="form-control">
                                                    </div>

                                                </div>
                                                <div class="form-group">


                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Iraupena (minututan)</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Iraupena idatzi, baldin badu" name="iraupena" class="form-control">
                                                    </div>

                                                </div>
                                         
                                            </div>
                                            <div class="panel-footer text-right">
                                                <button class="btn btn-info" type="submit">Gehitu</button>
                                            </div>
                                        </form>
                                        <!--===================================================-->
                                        <!--End Horizontal Form-->
                                    </div>
