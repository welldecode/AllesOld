 

jQuery.noConflict();


function templateSave(event, template_id) {
    event.preventDefault();
    'use strict';

    const formData = new FormData();

    document.getElementById("user_form").disabled = true;
    formData.append('template_id', template_id);
    formData.append('name', jQuery("#name").val()); 
    formData.append('visible', jQuery('#toggleB').is(':checked'));  
    formData.append('availability', jQuery('#availability').val()); 

    jQuery.ajax({
        type: "POST",
        url: "/dashboard/locate_work/store",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            document.getElementById("user_form").innerHTML = "Criando cliente...";
        },
        success: function (data) { 
            toastr.success(data[0]);  
            document.getElementById("user_form").disabled = false; 
            window.location.href = '/dashboard/locate_work';
 
        },
        error: function (data) { 
            document.getElementById("user_form").disabled = true;
            document.getElementById("user_form").innerHTML = "Ocorreu um erro, tente novamente!";
        }, 
    });
}  