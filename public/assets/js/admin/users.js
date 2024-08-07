 
jQuery.noConflict();


function templateSave(event, template_id) {
    event.preventDefault();
    'use strict';

    const formData = new FormData();

    document.getElementById("user_form").disabled = true; 
    formData.append('name', jQuery("#name").val());
    formData.append('email', jQuery("#email").val());   
    formData.append('password', jQuery("#password").val());  
    formData.append('password_confirmation', jQuery("#password_confirmation").val());  
    formData.append('type', jQuery('#type option:selected').val()); 
    jQuery.ajax({
        type: "POST",
        url: "/admin/users/store",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            document.getElementById("user_form").innerHTML = "Criando Usuário...";
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