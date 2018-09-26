<div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body np">
                                        <img src="{{PHOTO}}" alt="Cover" class="img-responsive">
                                        <div class="text-center">
                                            <!-- panel body -->
                                            <h4 class="text-lg text-overflow mar-top">{{USERNAME}}</h4>
                                            <p class="text-sm">{{DESC}}</p>
                                            <!--/ panel body -->
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-user"> </i> Kudeaketa</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                               {{PROFILE_INFO}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                             <div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Perfilaren administrazioa</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <p>Hemen zure perfilari buruzko informazioa ikus dezakezu. Arazoren bat baduzu, jar zaitez administratzailearekin harremanetan.</p>
                                    </div>
                                </div>
                       
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"> Ilarak </h3>
                                    </div>
                                    <div class="panel-body">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1"> Irratsaio guztiak </a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-2">Nireak</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                                                    <!--Hover Rows--> 
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th>Irratsaioa</th>
                                                                <th>Data</th>
                                                                <th>Egoera</th>
                                                                <th class="hidden-xs">Titulua</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{TABLE_ELEMENTS}}
                                                        
                                                        </tbody>
                                                    </table>
                                                    <!--===================================================--> 
                                                    <!--End Hover Rows--> 
                                                </div>
                                                <div id="demo-lft-tab-2" class="tab-pane fade">
                                                     <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th>Nora igoko da?</th>
                                                                <th>Data</th>
                                                                <th>Egoera</th>
                                                                <th class="hidden-xs">Titulua</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{TABLE_ELEMENTS2}}
                                                        
                                                        </tbody>
                                                    </table>
                                                    <!--===================================================-->
                                                    <!-- End Foo Table - Filtering -->
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <!--===================================================--> 
                                        <!--End Default Tabs (Left Aligned)--> 
                                    </div>
                                </div>
                            

                            </div>
                        </div>