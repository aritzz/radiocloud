
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Aldatu irratsaioak</h3>
                            </div>
                            <!-- Foo Table - Add & Remove Rows -->
                            <!--===================================================-->
                            <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                    <button onclick="location.href='?m=configuration&c=users&t=gehitu_remote';"  class="btn btn-danger">Gehitu irratsaioa sisteman</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-xs-center text-right">
                                                <div class="form-group">
                                                    <input id="demo-input-search2" type="text" placeholder="Bilatu" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <table id="config-users-tables2" class="config-users-tables table table-bordered table-hover toggle-circle" data-page-size="15">
                                    <thead>
                                        <tr>
                                            <th data-sort-initial="true" data-toggle="true" class="min-width" >Izena</th>
                                            <th class="min-width">Erabiltzailea</th>
                                            <th  class="min-width">Eguna</th>
                                            <th  class="min-width">Ordua</th>
                                                 <th  class="min-width">Iraup.</th>
                                         <!--   <th data-hide="phone, tablet">ID</th>-->
                                            <th data-sort-ignore="true" class="min-width">A</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{TABLE_ELEMENTS}}
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
                            <!--===================================================-->
                            <!-- End Foo Table - Add & Remove Rows -->
                        </div>