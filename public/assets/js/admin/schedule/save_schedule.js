
$(document).ready(function () {


  let currentInputGroupts = document.querySelectorAll(".group-schedule");
  let lastInputsParent = [...currentInputGroupts].at(-1);
  let lastInpusGroupId = lastInputsParent ? parseInt(lastInputsParent.getAttribute("data-inputs-id"), 10) : 0;

  $('.add-more').click(function (event) {

    const addMorePlaceholder = document.querySelector(".add-more-placeholder");

    const userTempaaate = document.querySelector('#geral');

    const newInputsMarkup = userTempaaate.content.cloneNode(true);
    const newInputsWrapper = newInputsMarkup.firstElementChild;

    newInputsWrapper.dataset.inputsId = lastInpusGroupId + 1;

    addMorePlaceholder.before(newInputsMarkup.firstElementChild);

    currentInputGroupts = document.querySelectorAll(".group-schedule");
    lastInputsParent = [...currentInputGroupts].at(-1);
    $(newInputsWrapper.querySelectorAll(".selectCollaborator")).selectize({
      maxItems: 1,
      delimiter: ",",
    });

    if (currentInputGroupts.length > 1) {
      document
        .querySelectorAll(".remove-inputs-group")
        .forEach((el) => el.removeAttribute("disabled"));
    }

    lastInpusGroupId++;


    return;

  });


  $("body").on("click", "#timer_f", function (e) {

    var filter_data = $('#schedule_form').serialize()

    var filter_obj = {
      filter_data: filter_data,
    }
    var filters = JSON.stringify(filter_obj)
    var date = $(this).val();
    $.ajax({
      type: "post",
      url: "/dashboard/schedule/checkDate",
      data: {
        filters: filters
      },
      dataType: 'json',
    });
    console.log(filters)
  });

  $("body").on("click", ".remove-inputs-group", function () {
    const button = $(this);
    const parent = button.closest(".group-schedule");
    const inputsId = parent.attr("data-inputs-id");

    $(`[data-inputs-id=${inputsId}]`).remove();

    currentInputGroupts = document.querySelectorAll(".group-schedule");
    lastInputsParent = [...currentInputGroupts].at(-1);

    if (currentInputGroupts.length > 1) {
      document
        .querySelectorAll(".remove-inputs-group")
        .forEach((el) => el.removeAttribute("disabled"));
    } else {
      document
        .querySelectorAll(".remove-inputs-group")
        .forEach((el) => el.setAttribute("disabled", true));
    }
  });


});
// Função responsvel por lista e criar um objeto com todos filtros
function getFilter() {

  var filter_data = $('#schedule_forms').serialize()

  var filter_obj = {
    filter_data: filter_data,
  }

  return filter_obj
}
function templateSave(event, template_id) {
  event.preventDefault();

  var filters = JSON.stringify(getFilter())

  $.ajax({
    type: "post",
    url: "/dashboard/schedule/store",
    data: {
      filters: filters,
    },
    dataType: 'json',
    success: function (data) {
      if (data.success == true) {

        Swal.fire({
          icon: "success",
          title: "Sucesso!",
          text: data[0]
        });
        setTimeout(function(){
      
          window.location.href = '/dashboard/schedule'; 
     },1000); //delay is in milliseconds 
 
      } else if (data.error == true) {
        Swal.fire({
          icon: "error",
          title: "Ocorreu um erro!",
          text: data[0]
        });
      }

    }
  });

} 