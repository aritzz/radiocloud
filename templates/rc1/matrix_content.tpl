<div class="form-group">
<div class="col-md-2"><button onclick="del_instance({{ID}}); return false;" class="btn btn-danger btn-icon icon-lg fa fa-times add-tooltip" data-toggle="tooltip" data-original-title="Ezabatu"></button>
                                                <button  class="btn btn-default btn-icon icon-lg fa fa-info add-tooltip" data-toggle="tooltip" data-original-title="Instantziaren identifikadorea (RadioCore emisiorako)"> Id: {{ID}}</button></div>
                                                
                                                <label data-name="{{ID}}" data-pk="{{ID}}" class="control-label col-md-2 instantzia_aldatu">{{NAME}}</label>
                                                <div class="col-md-8">
                                                    
                                                    <select id="sel{{ID}}" onchange="new_calendar({{ID}});return false;" class="form-control selectpicker" data-style="btn-warning">
                                                        {{CALENDARS}}
                                                    </select>
                                                    
                                                </div>
                                            </div>

<script type="text/javascript">

    function del_instance(id) {
        $(location).attr('href', 'index.php?m=radiocore&c=matrix&delInstance='+id);
    }

    function new_calendar(id) {
        var x = document.getElementById("sel"+id).value;

        $(location).attr('href', 'index.php?m=radiocore&c=matrix&editInstance='+id+'&newCalendar='+x);

    }
</script>