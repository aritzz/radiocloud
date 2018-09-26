
Dropzone.autoDiscover = false;
    $(function() {
        $("#progresu_barra").hide();
        $("#progresua_bukatuta").hide();
        $('#bidali_botoia').prop('disabled', true);


        var myDropzone = new Dropzone('#igotzeak', {
            url: 'index.php?m=radiopodcast&c=igotzeak&u=true',
            paramName: 'fitxeroa',
            maxFilesize: 500,
            maxFiles: 1,
            uploadMultiple: false,
            acceptedFiles: "audio/*",
            autoProcessQueue: true
        });
        
        
        
        myDropzone.on("success", function (file, responsetext) {
            if (responsetext == "FAIL") {
                alert("Fitxategia igotzean akatsa, saiatu berriz. Audio bat da?");
                 $("#igotzeak").show();
                 $("#progresu_barra").hide();
                 this.removeAllFiles();
            } else {
                $('#progresu_barra').fadeOut();
                $("#progresua_bukatuta").fadeIn();
                $('#bidali_botoia').prop('disabled', false);
                $('#fitxategi_id').val(responsetext);
            }
        });

       

        myDropzone.on("totaluploadprogress", function(file) {
           $('#progresu_barra_aldaketa').attr('aria-valuenow', file).css('width', file+"%");
        });

   

        myDropzone.on("addedfile", function(file) {
            if (file.type.toLowerCase().indexOf("audio") >= 0) { // konprobatu bidali aurretik
                $("#igotzeak").hide();
                $("#progresu_barra").show();
            } else
            this.removeAllFiles();
        });



    $('#dataaukeratu').datepicker({
        format: "yyyy/mm/dd",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
    $("#dataaukeratu").datepicker().datepicker("setDate", new Date());

    var bihurtuEditorea = function() {
        var content = $('textarea[name="content"]').html($('#editorea').code());
        alert($('#editorea').code());
    }

  $('#editorea').summernote({
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline']],
    ['fontsize', ['fontsize']],
    ['para', ['ul', 'ol', 'paragraph']],
  ]
});



});
