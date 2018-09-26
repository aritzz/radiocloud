                        <div class="row">


                            <div class="col-lg-6 grid">
<div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Irratsaioari buruz</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                    	  <form class="panel-body form-horizontal" action="index.php?m=radiopodcast&c=igotzeak" method="post" onsubmit="return bihurtuEditorea()">
                                        <!--Static-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Irratsaio data</label>
                                            <div class="col-md-9">
                                       			<!--<input id="demo-dp-txtinput" type="text" class="form-control">-->
                                       			<input type="text" name="data" class="form-control" id="dataaukeratu">


                                            </div>
                                        </div>
                                         <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Titulua</label>
                                            <div class="col-md-9">
                                                <input type="text" name="titulua" id="demo-text-input" class="form-control" placeholder="Zerri buruz doa irratsaioa?">
                                            </div>
                                        </div>
                                        <br/>
                                        <input id="fitxategi_id" name="fitxategi_id" type="hidden" value=""> 

                                         <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Zer egin?</label>
                                            <div class="col-md-9">
                                                 <div class="col-md-6 pad-no">
                                                    <!-- Icon Radio Buttons -->
                                                    <!-- Icon Checkboxes -->
                                                    <div class="checkbox">
                                                        <label class="form-checkboxx form-icon active">
                                                        <input name="errepikatu" type="checkbox" checked=""> Errepikapen bezala jarri</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label class="form-checkboxx form-icon">
                                                        <input name="igo_web" type="checkbox"> Podcasta webera igo</label>
                                                    </div>
                                                      <div class="checkbox">
                                                        <label class="form-checkboxx form-icon">
                                                        <input name="igo_arrosa" type="checkbox"> Podcasta arrosara igo</label>
                                                    </div>
                                                    <!-- <div class="checkbox">
                                                       <label class="form-checkbox form-icon">
                                                        <input name="kopiatu" type="hidden" value="0"> Nire karpetan kopiatu</label>

                                                    </div>-->




                                                </div>


                                            </div>
                                        </div>
                                        <br/>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Info gehiago</label>
                                            <div class="col-md-9">
                                       			<!--<div id="editorea"></div>-->
                                                <textarea id="editorea" name="editorea" rows="4" cols="50">
                                                </textarea>
                                            </div>
                                        </div>
 <br/>
									 <div class="panel-footer text-right">
                                                <button id="bidali_botoia" class="btn btn-warning" type="submit">Igo</button>
                                            </div>





                                        </form>
                                    </div>
 </div>
</div>
                            <div class="col-lg-6 grid">

<div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Audioa igo</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <form id="igotzeak" action="index.php?m=radiopodcast&c=igotzeak&u=true" enctype="multipart/form-data" class="dropzone">
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
<i class="fa fa-thumbs-o-up fa-5x animated faa-bounce"></i>

                                        </div>

                                    </div>
                                </div>


</div>
</div>