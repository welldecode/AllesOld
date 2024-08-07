 
jQuery.noConflict();


function templateSave(event, template_id) {
    event.preventDefault();
    'use strict';

    const formData = new FormData();

    document.getElementById("user_form").disabled = true;
    formData.append('template_id', template_id);
    formData.append('name', jQuery("#name").val());
    formData.append('email', jQuery("#email").val());
    formData.append('description', tinymce.activeEditor.getContent('description'));
    formData.append('visible', jQuery('#toggleB').is(':checked'));
    formData.append('image_user', '') && formData.append('image_user', myDropzone.files[0].name);
    formData.append('role', jQuery('#role option:selected').val());
    formData.append('availability', jQuery('#availability').val()); 

    jQuery.ajax({
        type: "POST",
        url: "/dashboard/client/store",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            document.getElementById("user_form").innerHTML = "Criando cliente...";
        },
        success: function (data) { 
            toastr.success(data[0]);  
            document.getElementById("user_form").disabled = false; 
 
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