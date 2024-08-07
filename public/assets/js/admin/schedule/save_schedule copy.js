
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
function templateSave(event, template_id) {
  event.preventDefault();

  const formData = new FormData()

  var equipaments = [];
  var operators = [];
  var signal_helper = [];
  var check_grade = [];
  var collaborators_extras = [];
  var timer = [];
  var timer_f = [];

  $(".equipaments").each(function () {
    equipaments.push($(this).val());
  });


  $(".operators").each(function () {
    operators.push($(this).val());
  });

  $(".signal_helper").each(function () {
    signal_helper.push($(this).val());
  });

  $(".collaborators_extras").each(function () {
    collaborators_extras.push($(this).val());
  });

  $(".timer").each(function () {
    timer.push($(this).val());
  });

  $(".timer_f").each(function () {
    timer_f.push($(this).val());
  });
  $(".check_grade").each(function () {
    check_grade.push($(this).val());
  });


  formData.append('template_id', template_id);
  formData.append('client', $("#client").val());
  formData.append('equipaments', equipaments.reduce((acc, i) => i ? [...acc, i] : acc, []));
  formData.append('operators', operators.reduce((acc, i) => i ? [...acc, i] : acc, []));
  formData.append('signal_helper', signal_helper.reduce((acc, i) => i ? [...acc, i] : acc, []));
  formData.append('collaborators_extras', collaborators_extras.reduce((acc, i) => i ? [...acc, i] : acc, []));
  formData.append('check_grade', check_grade.reduce((acc, i) => i ? [...acc, i] : acc, []));
  formData.append('timer', timer.reduce((acc, i) => i ? [...acc, i] : acc, []));
  formData.append('timer_f', timer_f.reduce((acc, i) => i ? [...acc, i] : acc, []));
  formData.append('visible', jQuery('#toggleB').is(':checked'));
  formData.append('availability', jQuery('#availability').val());

  Swal.fire({
    title: "Deseja criar o Planejamento?",
    text: "Confira todas as informações antes de confirmar.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Criar Planejamento!",
    cancelButtonText: "Cancelar!",
    reverseButtons: true
  }).then((result) => {
    jQuery.ajax({
      type: "POST",
      url: "/dashboard/schedule/store",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data['error']) {
          toastr.error(data[0]);
          Swal.fire({
            title: "Ocorreu um erro!",
            text: data[0],
            icon: "error"
          });
        } else if (data['warning']) {
          toastr.error(data[0]);
          Swal.fire({
            title: "Ops!",
            text: data[0],
            icon: "warning"
          });
        } else if (data['success']) {
          if (result.isConfirmed) {
            toastr.success(data[0]);
            Swal.fire({
              title: "Criado com Sucesso!",
              text: "Planejamento criado com sucesso!",
              icon: "success"
            });
            //window.location.href = '/dashboard/schedule';
          }
        }
      }
    });

  });
} 