<div class="form-group">
<div class="col-md-2"><button onclick="del_note({{ID}}); return false;" class="btn btn-danger btn-icon icon-lg fa fa-times add-tooltip" data-toggle="tooltip" data-original-title="Ezabatu"></button>
                                             </div>
                                                
                                                <label class="control-label col-md-2"> {{TITLE}}</label>
                                                <div class="col-md-8">
                                                   <strong>{{BY}}</strong> - {{DATE}} <br/>

                                                  {{TEXT}}<br/>
                                                    
                                                </div>
                                            </div>

<script type="text/javascript">

    function del_note(id) {
        $(location).attr('href', 'index.php?m=configuration&c=notes&delNote='+id);
    }

    
</script>