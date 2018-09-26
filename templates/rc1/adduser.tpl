<div class="row">
                            <div class="col-md-12">
                                <section class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Erabiltzaile berria </h3>
                                    </div>
                                    <div class="panel-body">
                                        <!-- START Form Wizard -->
                                        <form enctype="multipart/form-data" class="form-horizontal form-bordered" action="index.php?m=configuration&c=users" method="post" id="wizard-validate">
                                            <!-- Wizard Container 1 -->
                                            <div class="wizard-title"> Oinarrizkoa </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h4 class="text-primary"> <i class="fa fa-sign-in"></i> Identifikazioa </h4>
                                                        <p class="text-muted"> Sar itzazu identifikatzeko beharrezko datuak </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Erabiltzailea : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="erab" name="name" type="text" placeholder="Idatzi irratsaioaren izena tarterik gabe" data-parsley-required data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Posta elektronikoa : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="email" type="email" placeholder="Idatzi posta elektronikoa" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                               
                                               
                                            </div>
                                            <!--/ Wizard Container 1 -->
                                            <!-- Wizard Container 2 -->
                                            <div class="wizard-title"> Irratsaioa </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h4 class="text-primary"> <i class="fa fa-user"></i> Irratsaioa </h4>
                                                        <p class="text-muted"> Irratsaioari buruzko informazioa </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Irratsaioaren izena: <span class="text-danger">*</span> </label>
                                                            <input type="text" name="progizena" class="form-control" placeholder="Ondo idatzi irratsaioaren izena!" data-parsley-group="information" data-parsley-required />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Fitxategia: <span class="text-danger">*</span> </label>
                                                            <input  disabled="disabled" type="text" id="fitxategia" name="progfitxategia" class="form-control" placeholder="Last Name" data-parsley-group="information" data-parsley-required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Zer da irratsaioa? (motzean): <span class="text-danger">*</span> </label>
                                                            <input type="text" placeholder="Elkarrizketa programa bat" name="progdeskripzioa" class="form-control" data-parsley-group="information" data-parsley-required />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Zuzeneko emisioak baimendu:</label>
                                                            <select class="form-control" id="source" name="zuzenekoa">
                                                                <option value="1">Bai</option>
                                                                <option value="0" selected>Ez</option>
                                                                
                                                           
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Arrosako erabiltzailea: </label>
                                                            <input type="text" placeholder="Ez badu, hutsik utzi" name="arrosa_user" class="form-control" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Arrosako pasahitza:</label>
                                                             <input type="password" placeholder="Ez badu, hutsik utzi" name="arrosa_pass" class="form-control"  />

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Arrosako publikazio kategoria: </label>
                                                            <input type="text" placeholder="Ez badu, hutsik utzi" name="arrosa_category" class="form-control" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Pasahitza: </label>
                                                            <input type="password" placeholder="LDAP EZ BADU ERABILTZEN BETE" name="pass" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Zuzeneko emisio ordua (24h formatua): <span class="text-danger">*</span> </label>
                                                            <input name="ordua" type="text" placeholder="Ordua:Minutuak" data-mask="99:99" class="form-control" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Emisio iraupena (minututan):</label>
                                                            <input name="iraupena" type="text" placeholder="200" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Emisio eguna: </label>
                                                            <select name="eguna" class="form-control" id="source">
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
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Irratsaio taldea: </label>
                                                            <select name="block" class="form-control" id="source">
                                                               {{BLOCKS}}
                                                           
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ Wizard Container 2 -->

                                            <!-- Wizard Container 4 -->
                                            <div class="wizard-title"> Bukaera </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h4 class="text-primary"> <i class="fa fa-cog"></i> Bukaera </h4>
                                                        <p class="text-muted"> Erabiltzailea sortzeko prest dago, nahi baduzu igo bere argazkia eta egin klik bukatu botoian. </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Irratsaioaren karatula: </label>
                                                            <input name="argazkia" id="argazkia" type="file" />

                                                        </div>
                                                    </div>


                                                </div>
                                               
                                                
                                            </div>
                                            <!-- Wizard Container 4 -->
                                        </form>
                                        <!--/ END Form Wizard -->
                                    </div>
                                </section>
                            </div>
                        </div>

