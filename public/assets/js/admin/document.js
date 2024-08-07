$(".names").change(function (e) {
  var checkvalue = $(this).val();

  const addMorePlaceholder = document.querySelector(".add-more-placeholder");

  const userTempaaate = document.querySelector('#' + checkvalue);

  const newInputsMarkup = userTempaaate.content.cloneNode(true);

  currentInputGroupsts = document.querySelectorAll(".user-input-group"); 
  
  currentInputGroupts = document.querySelectorAll('#' + checkvalue);  
  addMorePlaceholder.replaceChildren(currentInputGroupts);
  addMorePlaceholder.innerHTML = '';
  if (e.target.checked === true) {
    addMorePlaceholder.appendChild(newInputsMarkup);
  } 
});


function templateSave(event, template_id) {
  event.preventDefault();
  'use strict';

  const formData = new FormData();
 
  var item_one = [];
  var item_two = [];
  $(".item_one").each(function () {
    item_one.push($(this).val());
  });

  $(".item_two").each(function () {
    item_two.push($(this).val());
  });
 
  formData.append('template_id', template_id);
  formData.append('name_document', jQuery("#name_document").val());
  formData.append('type_document', jQuery("#type_document").val());
  formData.append('collaborator', jQuery("#collaborators").val()); 
  formData.append('description', tinymce.activeEditor.getContent('description'));
  formData.append('expiration', jQuery("#expiration").val()); 
  
  formData.append('item_one', item_one);
  formData.append('item_two', item_two); 
  formData.append('visible', jQuery('#toggleB').is(':checked'));  

  jQuery.ajax({
      type: "POST",
      url: "/dashboard/document/store",
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: function () {
          document.getElementById("document_form").innerHTML = "Criando cliente...";
      },
      success: function (data) { 
          toastr.success(data[0]);    

      },
      error: function (data) {  
          document.getElementById("document_form").innerHTML = "Ocorreu um erro, tente novamente!";
      }, 
  });
} 
function templateSaveCategory(event, template_id) {
  event.preventDefault();
  'use strict';

  const formData = new FormData();

  document.getElementById("document_form").disabled = true;
  formData.append('template_id', template_id);
  formData.append('name', jQuery("#name").val());
  formData.append('color', jQuery("#color-picker").val()); 
  formData.append('visible', jQuery('#toggleB').is(':checked'));  

  jQuery.ajax({
      type: "POST",
      url: "/dashboard/document/category/store",
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: function () {
          document.getElementById("document_form").innerHTML = "Criando cliente...";
      },
      success: function (data) { 
          toastr.success(data[0]);   
          window.location.href = '/dashboard/document/category'; 

      },
      error: function (data) {  
          document.getElementById("document_form").innerHTML = "Ocorreu um erro, tente novamente!";
      }, 
  });
} 
var colorPicker = document.getElementById("color-picker");
    var colorValue = document.getElementById("value");
    colorPicker.onchange = function() {
        colorValue.innerHTML = colorPicker.value;
        colorValue.style.color = colorPicker.value;
    }