
                            <div class="panel" id="zakarrontzia">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Parrilaren edizioa</h3>
                                    </div>
                                    <div class="panel-body" >
                                        <!-- ============================================ --> 
                                      <div class="form-group">
                                               
                                                <div class="col-md-9">
                                                    <select class="form-control selectpicker" data-style="btn-default" onchange="switchCalendar();" id="calendar_list">
                                                        <option>Kargatzen...</option>
                                                        
                                                    </select>
                                                </div>
                                          <div class="col-md-3">
                                              <button  class="btn btn-success btn-icon icon-lg fa fa-plus add-tooltip" data-toggle="tooltip" data-original-title="Berria gehitu"  onclick="add_calendar()"></button>

                                             
                                              <button class="btn btn-purple btn-icon icon-lg fa fa-pencil-square-o add-tooltip" data-toggle="tooltip" data-original-title="Berrizendatu" onclick="rename_calendar()"></button>
                                              <button class="btn btn-dark btn-icon icon-lg fa fa-eraser add-tooltip" data-toggle="tooltip" data-original-title="Egutegia hustu"  onclick="erase_calendar()"></button>
                                              <button class="btn btn-pink btn-icon icon-lg fa fa-copy add-tooltip" data-toggle="tooltip" data-original-title="Kopia egin"   onclick="duplicate_calendar()"></button>
                                              <button class="btn btn-danger btn-icon icon-lg fa fa-trash add-tooltip" data-toggle="tooltip" data-original-title="Ezabatu"  id="calendar_remove" onclick="remove_calendar()"></button>

                                                </div>
                                            </div>




                                    </div>
                                </div>


<div class="row">
                            <div class="col-md-2">
                          
                               <div class="panel-group accordion calendar_text_11" id="accordion">
                                
                                
                                        <div id="rc-external-events">
                                            {{BLOCKS}}
                                         
                                        </div>
                                       
                                </div>
            


                            </div>
                            <div class="col-md-10">
                                <div class="panel">
                                    <div class="panel-body">
                                    
                                        
                                        <div id='rc-calendar' data-calendarid="0"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

<script type="text/javascript">
    /* Global vars */
    var calendar_id, fav_id;
    var len = 0;
    
    function read_calendars() {
        window.len=0;
   // for debugging purposes     console.debug($("#calendar_list"));
        $.getJSON("?m=radiocore&c=egutegia&AJAX_REQUEST=1&getCalendars=1", function(data) {
            $("#calendar_list").empty();
            $.each(data, function(){
                window.len++;
                if (window.len == 1) {
                    // matrizean dago defektuzko parrilen definizioa
                    $("#calendar_list").append('<option value="'+ this.id +'" selected>'+ this.name +'</option>');
                    fav_id = this.id;
                } else {
                    $("#calendar_list").append('<option value="'+ this.id +'">'+ this.name +'</option>');
                }
                
            });
        });
        $('#calendar_list').selectpicker('refresh');
        $('#calendar_favorite').attr('disabled', 'disabled');

        /*if (window.len < 2) {
            $('#calendar_remove').attr('disabled', 'disabled');
        } else {
            $('#calendar_remove').removeAttr('disabled');
        }*/
        
        switchCalendar();
    }
    var sources_calendar;
    sources_calendar = {
                    url: 'index.php?m=radiocore&c=egutegia&AJAX_REQUEST=1',
                    type: 'POST',
                    data: {
                        req: 'get_events',
                        calendarID: fav_id
                    },
                    error: function() {
                        alert('Egutegia jasotzean akatsen bat egon da!');
                    }
                };
    function switchCalendar() {
        var selectBox = document.getElementById("calendar_list");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        
       
        $('#rc-calendar').attr('data-calendarid', selectedValue);
        sources_calendar = {
                    url: 'index.php?m=radiocore&c=egutegia&AJAX_REQUEST=1',
                    type: 'POST',
                    data: {
                        req: 'get_events',
                        calendarID: selectedValue
                    },
                    error: function() {
                        alert('Egutegia jasotzean akatsen bat egon da!');
                    }
                };
        $('#rc-calendar').fullCalendar('removeEvents');
        $('#rc-calendar').fullCalendar('removeEventSources');
        $('#rc-calendar').fullCalendar('addEventSource', sources_calendar);

    }
    
    function refetcha() {
        $('#rc-calendar').fullCalendar('refetchEvents');
    }
    
    function erase_calendar() {
        var r = confirm("Egutegi guztia hustuko duzu aukera honekin. Ziur al zaude?");
        if (r == true) {
            var selectBox = document.getElementById("calendar_list");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            $.ajax({
                method: "POST",
                url: "index.php?m=radiocore&c=egutegia&AJAX_REQUEST=1&calChange=erase",
                data: { id: selectedValue }
            })
            .done(function( msg ) {
                switchCalendar();
            });
        }
    }
    
     function remove_calendar() {
        var r = confirm("Egutegia eta bere edukia ezabatzera zoaz. Ziur al zaude?");
        if (r == true) {
            var selectBox = document.getElementById("calendar_list");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            $.ajax({
                method: "POST",
                url: "index.php?m=radiocore&c=egutegia&AJAX_REQUEST=1&calChange=del",
                data: { id: selectedValue }
            })
            .done(function( msg ) {
                $("#calendar_list option[value='"+selectedValue+"']").remove();
                 $('#calendar_list').selectpicker('refresh');
                switchCalendar();
            });
            
            
        } 
    }
    
    function add_calendar() {
        var calname = prompt("Parrila berriaren izena idatzi");
        if (calname != null) {
            $.ajax({
                method: "POST",
                url: "index.php?m=radiocore&c=egutegia&AJAX_REQUEST=1&calChange=add",
                data: { name: calname }
            })
            .done(function( msg ) {
                if ($.isNumeric(msg))
                {
                    $("#calendar_list").append('<option value="'+ msg +'">'+ calname +'</option>');
                    $('#calendar_list').selectpicker('refresh');
                    

                }
            });
        }
    }
    function duplicate_calendar() {
        var calname = prompt("Kopiaren izena idatzi");
        var selectBox = document.getElementById("calendar_list");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        
        if (calname != null) {
            $.ajax({
                method: "POST",
                url: "index.php?m=radiocore&c=egutegia&AJAX_REQUEST=1&calChange=clone",
                data: { name: calname, id: selectedValue}
            })
            .done(function( msg ) {
                
                if ($.isNumeric(msg))
                {
                    $("#calendar_list").append('<option value="'+ msg +'">'+ calname +'</option>');
                    $('#calendar_list').selectpicker('refresh');
                    

                }
            });
        }
    }
    
    function rename_calendar() {
        var selectBox = document.getElementById("calendar_list");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var selectedText  = selectBox.options[selectBox.selectedIndex].text;
        var calname = prompt("Izen berria idatzi", selectedText);

        
        if (calname != null) {
            $.ajax({
                method: "POST",
                url: "index.php?m=radiocore&c=egutegia&AJAX_REQUEST=1&calChange=rename",
                data: { name: calname, id: selectedValue}
            })
            .done(function( msg ) {
                
                if (msg == "OK")
                {
                    $("#calendar_list option[value='"+selectedValue+"']").text(calname);
                    $('#calendar_list').selectpicker('refresh');
                    

                }
            });
        }
        
    }
    
     window.onload = function() {
        // alert("a");
        read_calendars();
      //   $('#calendar_list').selectpicker('refresh');
         setTimeout(read_calendars, 2000);
         //setTimeout(switchCalendar, 2500);
     };   
   

</script>