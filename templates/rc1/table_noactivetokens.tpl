
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Kadukatuta dauden tokenak</h3>
                            </div>
                            <!-- Foo Table - Add & Remove Rows -->
                            <!--===================================================-->
                            <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                    <button onclick="location.href='?m=configuration&c=tokens&cleanExpired=1';"  class="btn btn-danger">Zaharrak garbitu</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                <table id="demo-foo-addrow4" class="table table-bordered table-hover toggle-circle" data-page-size="15">
                                    <thead>
                                        <tr>
                                            <th data-sort-initial="true" data-toggle="true">Erabiltzailea</th>
                                            <th>Azken sarrera</th>
                                            <th >Nondik</th>
                                         <!--   <th data-hide="phone, tablet">ID</th>-->
                                            <th >Bukatzea</th>
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


<script type="text/javascript">

    function remove_token(id) {
        $(location).attr('href', 'index.php?m=configuration&c=tokens&removeToken='+id);
    }

    
</script>