 

jQuery.noConflict();


function templateSave(event, template_id) {
    event.preventDefault();
    'use strict';

    const formData = new FormData();

    document.getElementById("functions_form").disabled = true;
    formData.append('template_id', template_id);
    formData.append('name', jQuery("#name").val());  
    formData.append('visible', jQuery('#toggleB').is(':checked'));
    formData.append('type', jQuery('#type option:selected').val());
    formData.append('availability', jQuery('#availability').val()); 

    jQuery.ajax({
        type: "POST",
        url: "/dashboard/functions/store",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            document.getElementById("functions_form").innerHTML = "Criando Função...";
        },
        success: function (data) { 
            toastr.success(data[0]);  
            document.getElementById("functions_form").disabled = false; 
            window.location.href = '/dashboard/functions'; 
 
        },
        error: function (data) { 
            document.getElementById("functions_form").disabled = true;
            document.getElementById("functions_form").innerHTML = "Ocorreu um erro, tente novamente!";
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