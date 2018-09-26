                                    <div class="panel">
                                        <div class="panel-heading">
                                            
                                            <h3 class="panel-title">Gehitu podcasta</h3>
                                        </div>
                                        <!--Horizontal Form-->
                                        <!--===================================================-->
                                        <form class="form-horizontal" method="post">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Podcast izena</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Idatzi podcastaren izena" name="izena" class="form-control">
                                                    </div>
                                                </div>
 <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Podcastaren HTTP helbidea</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Idatzi podcastaren helbidea" name="url" class="form-control">
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


                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Deskarga eguna</label>

                                                    <div class="col-sm-9">
                                                        <select class="form-control selectpicker" name="desk_eguna">
                                                            <option value="0">Astelehena</option>
                                                            <option value="1">Asteartea</option>
                                                            <option value="2">Asteazkena</option>
                                                            <option value="3">Osteguna</option>
                                                            <option value="4">Ostirala</option>
                                                            <option value="5">Larunbata</option>
                                                            <option value="6">Igandea</option>
                                                     </select>
                                                    </div>

                                                </div>

                                                <div class="form-group">


                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Deskarga mota</label>

                                                    <div class="col-sm-9">
                                                        <select class="form-control selectpicker" name="eguna">
                                                            <option value="0">Azkena bakarrik</option>
                                                            <option value="1">Guztiak deskargatu, eta bat erreproduzitu (ausaz)</option>
                                                       
                                                     </select>
                                                    </div>

                                                </div>
                                                <div class="form-group">


                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Deskarga ordua</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Adibidez 4 (goizeko 4retarako)" name="ordua" class="form-control">
                                                    </div>

                                                </div>
                                         
                                            


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Iraupena</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Podcastaren iraupena minututan" name="iraupena" class="form-control">
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
