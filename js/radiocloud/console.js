    $(".grid").sortable({
        tolerance: 'pointer',
        revert: 'invalid',
        handle: '.panel-heading',
        connectWith: '.row > [class*=col]',
        placeholder: 'well placeholder tile',
        forceHelperSize: true
    });

    $("#add_console").hide();

// Jingle upload
var myDropzone2 = new Dropzone('#jingleupload', {
        url: 'index.php?m=radiolive&c=console&AJAX_REQUEST=1&u=1',
        paramName: 'fitxeroa',
        maxFilesize: 100,
        maxFiles: 1,
        uploadMultiple: false,
        acceptedFiles: "audio/*",
        autoProcessQueue: true
    });

   
        myDropzone2.on("success", function (file, responsetext) {
            if (responsetext == "FAIL") {
                alert("Fitxategia igotzean akatsa, saiatu berriz. Audio bat da?");
                 $("#jingleupload").show();
                 $("#progresu_barra").hide();
                 this.removeAllFiles();
            } else {
                $('#progresu_barra').fadeOut();
                $("#progresua_bukatuta").fadeIn();
                $('#bidali_botoia').prop('disabled', false);
                this.removeAllFiles();
                $('#igokuina').attr('name', responsetext);
            }
        });

       

        myDropzone2.on("totaluploadprogress", function(file) {
           $('#progresu_barra_aldaketa').attr('aria-valuenow', file).css('width', file+"%");
        });

   

        myDropzone2.on("addedfile", function(file) {
            if (file.type.toLowerCase().indexOf("audio") >= 0) { // konprobatu bidali aurretik
                $("#jingleupload").hide();
                $("#progresu_barra").show();
            } else
            this.removeAllFiles();
        });

// Intro upload