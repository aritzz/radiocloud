// Live stream
//

  function live_start() {
        $('#live_aurretik').hide();
        $('#live_gero').show(1000);
        $('#zuzenean_mezua').show(200);
    }

$(document).ready(function() {

  


    $('#live_start').on('click', function () {
        live_start();

       
        $.ajax({
            url: '?m=radiolive&c=live',
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
            url: '?m=radiolive&c=live',
            data: {
                update_live_status: 2
            },
            dataType : 'json'
        });
    });


    $.ajax({
            url: '?m=radiolive&c=zuzenean&get_live_status=1',
            dataType : 'html',
            success : function(data) {
                if (data == 1) {
                    $('#live_aurretik').hide();
                    $('#live_gero').show();
                    $('#zuzenean_mezua').show();
                }
            }
        });



});