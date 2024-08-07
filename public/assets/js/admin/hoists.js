 
jQuery.noConflict();


function templateSave(event, template_id) {
    event.preventDefault();
    'use strict';

    const formData = new FormData();

    document.getElementById("hoist_form").disabled = true;
    formData.append('template_id', template_id);
    formData.append('model', jQuery("#model").val());
    formData.append('plate', jQuery("#plate").val());
    formData.append('type',jQuery("#type").val());
    formData.append('frotas',jQuery("#frotas").val());
    formData.append('visible', jQuery('#toggleB').is(':checked'));
    formData.append('image_user', '') && formData.append('image_user', myDropzone.files[0].name);  
    jQuery.ajax({
        type: "POST",
        url: "/dashboard/equipment/store",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            document.getElementById("hoist_form").innerHTML = "Criando Guindaste...";
        },
        success: function (data) { 
            toastr.success(data[0]);  
            document.getElementById("hoist_form").disabled = false; 
            window.location.href = '/dashboard/equipment'; 
 
        },
        error: function (data) { 
            document.getElementById("user_form").disabled = true;
            document.getElementById("user_form").innerHTML = "Ocorreu um erro, tente novamente!";
        }, 
    });
} 
//Dropzone class
var myDropzone = new Dropzone(".dropzone", {
    url: "#",
    paramName: "file",
    uploadMultiple: false,
    createImageThumbnails: true,
    thumbnailMethod: "crop",
    autoProcessQueue: false,
    addRemoveLinks: true,
    dictDefaultMessage: "Arraste e solte sua imagem",
    dictRemoveFile: "Remover Imagem",
});