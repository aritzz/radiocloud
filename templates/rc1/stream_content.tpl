<div class="form-group">
<div class="col-md-2"><button onclick="del_instance({{ID}}); return false;" class="btn btn-danger btn-icon icon-lg fa fa-times add-tooltip" data-toggle="tooltip" data-original-title="Ezabatu"></button>
                                             </div>
                                                
                                                <label class="control-label col-md-2"> ({{TYPE}}) {{NAME}}</label>
                                                <div class="col-md-8">
                                                  <strong>Zerbitzaria:</strong> {{URL}}<br/>
                                                  <strong>Montatze-puntua edo ID:</strong> {{MOUNT}}
                                                    
                                                </div>
                                            </div>

<script type="text/javascript">

    function del_instance(id) {
        $(location).attr('href', 'index.php?m=radiolive&c=stream&delInstance='+id);
    }

    
</script>