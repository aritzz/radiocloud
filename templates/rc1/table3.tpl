
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Aldatu podcastak</h3>
                            </div>
                            <!-- Foo Table - Add & Remove Rows -->
                            <!--===================================================-->
                            <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                    <button onclick="location.href='?m=radiocore&c=podcast&t=gehitu';"  class="btn btn-warning">Gehitu podcasta</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-xs-center text-right">
                                                <div class="form-group">
                                                    <input id="demo-input-search2" type="text" placeholder="Bilatu" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <table id="demo-foo-addrow3" class="table table-bordered table-hover toggle-circle" data-page-size="15">
                                    <thead>
                                        <tr>
                                            <th data-sort-initial="true" data-toggle="true">Izena</th>
                                            <th>Eguna</th>
                                            <th>Ordua</th>
					    <th data-hide="phone, tablet">Eguneraketa</th>
                                            <th data-hide="phone, tablet">URL</th>
                                            <th data-hide="phone, tablet">Blokea</th>
                                            <th data-sort-ignore="true" class="min-width">Aldaketak</th>
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
