                    <!--===================================================-->
                    <div id="page-content">
                      <!-- <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Podcastei buruz</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p><strong>Garrantzitsua</strong>: Sekzio hau <strong>bakar-bakarrik</strong> kanpoko podcastak gehitzeko eta kudeakeatzeko erabiltzen da. Podcast lokalak (irratikoak) automatikoki gehitzen dira blokeetara.<br/><br/>Kanpoko podcast bat gehitzean URL helbidea eta jarri nahi diozun izena espezifika itzazu. Beste guztia, utzi automatizazioaren esku.</p>
                                    </div>
                                </div>-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Diskoen bilduma</h3>
                            </div>

<!-- Foo Table - Add & Remove Rows -->
                            <!--===================================================-->
                            <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                        
                                            <div class="col-sm-12 text-xs-center text-right">
                                                <div class="form-group">
                                                    <input id="demo-input-search2" type="text" placeholder="Bilatu" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <table id="music_collection" class="table table-bordered table-hover toggle-circle" data-page-size="15" data-filter="#demo-input-search2">
                                    <thead>
                                        <tr>
                                            <th data-sort-initial="true" data-toggle="true">Taldea</th>
                                            <th>Diskoa</th>
                                            <th>Argitaletxea</th>
					    <th data-hide="phone, tablet">Urtea</th>
                                            <th data-hide="phone, tablet">Estiloa</th>
                                            <th >Mota</th>
                                            <th data-hide="phone, tablet">Kokapena</th>
                                            <th data-sort-ignore="true" class="min-width ">Karatula</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                          {{DISCS}}
                                       
                                        

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

                    </div>
