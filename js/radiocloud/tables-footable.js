// Tables-FooTable.js
// ====================================================================
// Need to cleanup
//
$(document).ready(function() {





    // Row Toggler
    // -----------------------------------------------------------------
    $('#demo-foo-row-toggler').footable();




    // Expand / Collapse All Rows
    // -----------------------------------------------------------------
    var fooColExp = $('#demo-foo-col-exp');
    fooColExp.footable().trigger('footable_collapse_all');


    $('#demo-foo-collapse').on('click', function() {
        fooColExp.trigger('footable_collapse_all');
    });
    $('#demo-foo-expand').on('click', function() {
        fooColExp.trigger('footable_expand_all');
    })




    // Accordion
    // -----------------------------------------------------------------
    $('#demo-foo-accordion').footable().on('footable_row_expanded', function(e) {
        $('#demo-foo-accordion tbody tr.footable-detail-show').not(e.row).each(function() {
            $('#demo-foo-accordion').data('footable').toggleDetail(this);
        });
    });




    // Pagination
    // -----------------------------------------------------------------
    $('#demo-foo-pagination').footable();
    $('#demo-show-entries').change(function(e) {
        e.preventDefault();
        var pageSize = $(this).val();
        $('#demo-foo-pagination').data('page-size', pageSize);
        $('#demo-foo-pagination').trigger('footable_initialized');
    });
    
    

var music_collection = $('#music_collection');
    music_collection.footable().on('click', '.demo-delete-row', function() {

        //get the footable object
        var footable = music_collection.data('footable');

        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');
        // id at row.data("ident");
            $.ajax({
                method: "POST",
                url: "?m=radiocore&c=podcast&AJAX_REQUEST=1",
                data: { action: "delete", id: row.data("ident") }
            })
            .done(function( msg ) {
                footable.removeRow(row);
            });
        //delete the row
        
    });


    // Filtering
    // -----------------------------------------------------------------
    var filtering = $('#demo-foo-filtering');
    filtering.footable().on('footable_filtering', function(e) {
        var selected = $('#demo-foo-filter-status').find(':selected').val();
        e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
        e.clear = !e.filter;
    });

    // Filter status
    $('#demo-foo-filter-status').change(function(e) {
        e.preventDefault();
        filtering.trigger('footable_filter', {
            filter: $(this).val()
        });
    });

    // Search input
    $('#demo-foo-search').on('input', function(e) {
        e.preventDefault();
        filtering.trigger('footable_filter', {
            filter: $(this).val()
        });
    });




    // Add & Remove Row
    // -----------------------------------------------------------------
    var addrow = $('#demo-foo-addrow');
    addrow.footable().on('click', '.demo-delete-row', function() {

        //get the footable object
        var footable = addrow.data('footable');

        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');
        if (row.data("ident") > 2) {
            $.ajax({
                method: "POST",
                url: "?m=radiocore&c=blokeak&AJAX_REQUEST=1",
                data: { block: "block", action: "delete", id: row.data("ident") }
            })
            .done(function( msg ) {
              //  alert( "Deleted: " + msg );
                footable.removeRow(row);
            });
        }
        //delete the row
    });
    var addrow2 = $('#demo-foo-addrow2');
    addrow2.footable().on('click', '.demo-delete-row', function() {

        //get the footable object
        var footable = addrow2.data('footable');

        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');
        // id at row.data("ident");
        if (row.data("ident") > 1) {
            $.ajax({
                method: "POST",
                url: "?m=radiocore&c=blokeak&AJAX_REQUEST=1",
                data: { block: "group", action: "delete", id: row.data("ident") }
            })
            .done(function( msg ) {
               // alert( "Deleted: " + msg );
                footable.removeRow(row);
            });
        //delete the row
        }
    });

var addrow3 = $('#demo-foo-addrow3');
    addrow3.footable().on('click', '.demo-delete-row', function() {

        //get the footable object
        var footable = addrow3.data('footable');

        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');
        // id at row.data("ident");
            $.ajax({
                method: "POST",
                url: "?m=radiocore&c=podcast&AJAX_REQUEST=1",
                data: { action: "delete", id: row.data("ident") }
            })
            .done(function( msg ) {
                footable.removeRow(row);
            });
        //delete the row
        
    });


var addrow4 = $('#demo-foo-addrow4');
    addrow4.footable().on('click', '.demo-delete-row', function() {

        //get the footable object
        var footable = addrow4.data('footable');

        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');
        // id at row.data("ident");
            $.ajax({
                method: "POST",
                url: "?m=radiocore&c=podcast&AJAX_REQUEST=1",
                data: { action: "delete", id: row.data("ident") }
            })
            .done(function( msg ) {
                footable.removeRow(row);
            });
        //delete the row
        
    });


var addrow5 = $('.config-users-tables');
    addrow5.footable().on('click', '.rc-delete-row', function() {

        //get the footable object
        var footable = addrow5.data('footable');

        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');
        // id at row.data("ident");
            $.ajax({
                method: "POST",
                url: "index.php?m=configuration&c=users&AJAX_REQUEST=1",
                data: { action: "delete", id: row.data("ident") }
            })
            .done(function( msg ) {
                footable.removeRow(row);
                /*alert(row.data("ident"));
                alert(msg);*/
            });
        //delete the row
        
    });
addrow5.footable().on('click', '.disable-user', function() {

        //get the footable object
        var footable = addrow4.data('footable');
        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');
 $(this).toggleClass( "btn-success" );
        // id at row.data("ident");
            $.ajax({
                method: "POST",
                url: "index.php?m=configuration&c=users&AJAX_REQUEST=1",
                data: { action: "disable", id: row.data("ident") }
            })
            .done(function( msg ) {
               
            });
        //delete the row
        
    });

addrow5.footable().on('click', '.disable-live', function() {

        //get the footable object
        var footable = addrow4.data('footable');
        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');
 $(this).toggleClass( "btn-success" );
        // id at row.data("ident");
            $.ajax({
                method: "POST",
                url: "index.php?m=configuration&c=users&AJAX_REQUEST=1",
                data: { action: "live", id: row.data("ident") }
            })
            .done(function( msg ) {
               
            });
        //delete the row
        
    });


    $('.izena_aldatu_user').editable({
        type: 'text',
        name: 'izena',
        url: 'index.php?m=configuration&c=users&AJAX_REQUEST=1&EDIT=1',


        title: 'Aldatu izena',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        },
        error: function(response) {
            alert(response);
        }

    });

    $('.izena_aldatu_username').editable({
        type: 'text',
        name: 'erabiltzailea',
        url: 'index.php?m=configuration&c=users&AJAX_REQUEST=1&EDIT=1',


        title: 'Aldatu erabiltzailea',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        },
        error: function(response) {
            alert(response);
        }

    });

    $('.iraupena_aldatu').editable({
        type: 'text',
        name: 'iraupena',
        url: 'index.php?m=configuration&c=users&AJAX_REQUEST=1&EDIT=1',


        title: 'Aldatu iraupena',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        },
        error: function(response) {
            alert(response);
        }

    });

    $('.ordua_erab_aldatu').editable({
        type: 'text',
        name: 'ordua',
        url: 'index.php?m=configuration&c=users&AJAX_REQUEST=1&EDIT=1',


        title: 'MANTENDU FORMATUA MESEDEZ',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        },
        error: function(response) {
            alert(response);
        }

    });
   
    $('.aldatu_pasahitza_user').editable({
        type: 'password',
        name: 'pasahitza',
        url: 'index.php?m=configuration&c=users&AJAX_REQUEST=1&EDIT=1',


        title: 'Pasahitz berria',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        },
        display: function(value, response) {
        //render response into element
            $(this).html(response);
        },
        error: function(response) {
            alert(response);
        }

    });

    $('.eguna_aldatu').editable({
        
        name: 'eguna',
        prepend: "hautatu berria",
        source: [
            {value: 0, text: 'Astelehena'},
            {value: 1, text: 'Asteartea'},
            {value: 2, text: 'Asteazkena'},
            {value: 3, text: 'Osteguna'},
            {value: 4, text: 'Ostirala'},
            {value: 5, text: 'Larunbata'},
            {value: 6, text: 'Igandea'}
        ],
        url: 'index.php?m=configuration&c=users&AJAX_REQUEST=1&EDIT=1'
    });
   


    //defaults
    $.fn.editable.defaults.mode = 'popover';


    //editables 
    $('.izena_aldatu_blokea').editable({
        type: 'text',
        name: 'blokea',
        url: 'index.php?m=radiocore&c=blokeak&AJAX_REQUEST=1&EDIT=1',


        title: 'Sartu izena',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        },
        error: function(response) {
            alert(response);
        }

    });

     //editables 
    $('.podcast_izena').editable({
        type: 'text',
        name: 'izena',
        url: 'index.php?m=radiocore&c=podcast&AJAX_REQUEST=1&EDIT=1',


        title: 'Sartu izena',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        }

    });
    $('.podcast_ordua').editable({
        type: 'text',
        name: 'ordua',
        url: 'index.php?m=radiocore&c=podcast&AJAX_REQUEST=1&EDIT=1',


        title: 'Sartu ordua',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        }

    });
    $('.podcast_url').editable({
        type: 'text',
        name: 'url',
        url: 'index.php?m=radiocore&c=podcast&AJAX_REQUEST=1&EDIT=1',


        title: 'Sartu helbidea',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        }

    });

        //editables 
    $('.izena_aldatu_mota').editable({
        type: 'text',
      //  pk: 1,
        name: 'mota',
        url: 'index.php?m=radiocore&c=blokeak&AJAX_REQUEST=1&EDIT=1',

       /* ajaxOptions: {
            data: { block: "group", action: "delete", id: $('td').data("prr") }
        },*/

        title: 'Sartu izena',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';
           /* else
            {
                var row = $(this).parents('tr:first');
                $.ajax({
                    method: "POST",
                    url: "?m=radiocore&c=blokeak&AJAX_REQUEST=1",
                    data: { block: "group", action: "change" }
                })
                .done(function( msg ) {
                    alert( "Deleted: " + msg + value + row );
                });
            }*/
        },
        success: function(response) {
            alert(response);
        }

    });

   /* $('.izena_aldatu').on('update', function(e, editable) {
            alert('new value: ' + editable.value);
    });*/

    $('.url_aldatu').editable({
        type: 'text',
        pk: 1,
        name: 'url',
        title: 'Sartu URL',
        url: 'index.php?m=radiocore&c=blokeak&AJAX_REQUEST=1&EDIT=1',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';
        }
    });
    $('.aktibo_aldatu').editable({
        value: ["Aktibo", "Inaktibo"],
        name: 'egoera',
        source: [{
            value: "Aktibo",
            text: 'Aktibo'
        }, {
            value: "Inaktibo",
            text: 'Inaktibo'
        }],
        url: 'index.php?m=radiocore&c=blokeak&AJAX_REQUEST=1&EDIT=1',
        validate: function(value) {
            //alert(value);
            if (value === "Aktibo") {
                $(this).addClass('label-success');
            }
            else {
                $(this).addClass("label-dark");
            }
        } 
    });



    $('.podcast_eguna').editable({
        
        name: 'egoera',
        prepend: "hautatu berria",
        source: [
            {value: 0, text: 'Astelehena'},
            {value: 1, text: 'Asteartea'},
            {value: 2, text: 'Asteazkena'},
            {value: 3, text: 'Osteguna'},
            {value: 4, text: 'Ostirala'},
            {value: 5, text: 'Larunbata'},
            {value: 6, text: 'Igandea'}
        ],
        url: 'index.php?m=radiocore&c=podcast&AJAX_REQUEST=1&EDIT=1'
    });
   
    $( ".behartu" ).click(function() {
        $.ajax({
          url: "index.php?m=radiocore&c=podcast&AJAX_REQUEST=1&FORCE=1&id="+$(this).data('ident'),
          context: document.body
        }).done(function() {
          alert("Egukeraketa-eskaera bidali da");
        });
    });

    // Search input
    $('#demo-input-search2').on('input', function(e) {
        e.preventDefault();
        addrow.trigger('footable_filter', {
            filter: $(this).val()
        });
    });


$.fn.editable.defaults.mode = 'popup';

 $('.path').editable({
        type: 'text',
        name: $(this).data('name'),
        url: 'index.php?m=configuration&c=ident&AJAX_REQUEST=1&EDIT=1',


        title: 'Aldatu iraupena',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        }/*,display: function(value, response) {
        //render response into element
            $(this).html(response);
        },*/
        ,error: function(response) {
            alert(response);
        }

    });


 $('.path2').editable({
        type: 'text',
        name: $(this).data('name'),
        url: 'index.php?m=configuration&c=ident&AJAX_REQUEST=1&EDIT=2',


        title: 'Aldatu iraupena',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        },
        error: function(response) {
            alert(response);
        }

    });
    
    $('.instantzia_aldatu').editable({
        type: 'text',
        name: $(this).data('name'),
        url: 'index.php?m=radiocore&c=matrix&AJAX_REQUEST=1&EDIT=1',


        title: 'Aldatu izena',
        validate: function(value) {
            if ($.trim(value) == '') return 'Ezin duzu hutsik utzi';

        },
        error: function(response) {
            alert(response);
        }

    });

   $('.modulator').click(function () {
    // your function here
        $.ajax({
                method: "POST",
                url: "index.php?m=configuration&c=mode&AJAX_REQUEST=1",
                data: { menuid: $(this).data('menuitem'), moduleid: $(this).data('module'), userid: $(this).data('user'), modmod: $(this).data('modmod') }
            })
            .done(function( msg ) {
               //alert(msg);
            });


    });

    $('#live_start').on('click', function () {
        $('#live_aurretik').hide();
        $('#live_gero').show(1000);
        $('#zuzenean_mezua').show(200);

       
        $.ajax({
            url: '?m=radiolive&c=zuzenean',
            data: {
                update_live_status: 1
            },
            dataType : 'json'
        });
    });
    $('#live_stop').on('click', function () {
        $('#live_aurretik').show(1000);
        $('#live_gero').hide(200);
        $('#zuzenean_mezua').hide(200);

        
        $.ajax({
            url: '?m=radiolive&c=zuzenean',
            data: {
                update_live_status: 2
            },
            dataType : 'json'
        });
    });




});