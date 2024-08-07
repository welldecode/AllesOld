jQuery(function ($) {

  // Função responsvel por lista e criar um objeto com todos filtros
  function getFilter() {

    var filter_data = $('#schedule_filter_form').serialize()

    var filter_obj = {
      filter_data: filter_data,
    }

    return filter_obj
  }

  function getSchedule(page) {
    if (page > 0) {
      var filters = JSON.stringify(getFilter())
      obj = getFilter();
      window.history.replaceState(null, null, window.location.pathname + "?" + obj['filter_data'] + '&pagina=' + page + '&day_planning=1');
      $.ajax({
        type: "post",
        url: "/dashboard/schedule/load",
        data: {
          pagina: page,
          type: 'lista',
          filters: filters
        },
        dataType: 'json',
        beforeSend: function () {

          $('.check_schedule').css("display", "block");
          $('.info-schedule').html('<div class="loading-post"><div class="loader"><div class="loader-wheel"></div></div></div>');
          $('.paginacao').empty();
          $('.display').css("display", "none");
          $('#delete_schedule').empty();

          var posicaoIr = $('.info-schedule').offset().top;
          posicaoIr = posicaoIr - 64;
          window.scrollTo({ top: posicaoIr, behavior: 'smooth' });
        },
        success: function (data) {
          if (data['schedules']) { 
            $('.check_schedule').css("display", "block");
            $('.info-schedule').empty();
            $('.notf').empty();
            $('.display').css("display", "block");
            $('#delete_schedule').html(`   
            <div class="flex justify-between items-center gap-4 mb-5">
            <div class="flex flex-col gap-2">
        <h1 class="font-extrabold text-zinc-700 dark:text-zinc-100 text-2xl border-b border-solid  py-3">    Cliente:  ${data.client}</h1> 
          <span class="font-regular text-zinc-500 dark:text-zinc-100  italic text-sm">Quando a data final das grades passar da validade, os equipamentos e colaboladores iram ficar disponíveis novamente.</span> </div>
          <div class="flex items-center gap-4"> 
            <a href="/dashboard/schedule/addOrUpdate/${data.id}"  id="get_day" class="font-medium text-zinc-600 dark:text-zinc-100 inline-flex"><span class=" cursor-pointer hover:bg-primary-hover bg-primary text-white px-2 py-2 font-bold  text-sm rounded-md dark:text-zinc-50">Editar Planejamento</span></a>
            <a href="/dashboard/schedule/delete/${data.id}"  id="get_day" class="font-medium text-zinc-600 dark:text-zinc-100 inline-flex"><span class=" cursor-pointer hover:bg-red-400 bg-red-600 text-white px-2 py-2 font-bold  text-sm rounded-md dark:text-zinc-50">Deletar Planejamento</span></a>
            </div></div>`); 
            $('#demo').DataTable({
              destroy: true,
              data: data['schedules'],
              columns: [ 
                { data: 'operator' },
                { data: 'equipaments' },
                { data: 'signal_helper' },
                { data: 'collaborators_extras' },
                { data: 'work_place' },
                { data: 'responsible' },
                { data: 'timer_inicio' },
                { data: 'timer_final' }
              ],
              lengthChange: false,
              pageLength: data['item_page'],
              responsive: true,
              "language": {
                "sProcessing": "Carregando...",
                "sLengthMenu": "_MENU_",
                "sZeroRecords": "Nenhum planejamento encontrado",
                "sEmptyTable": "Nenhum planejamento encontrado no sistema.",
                "sInfo": "Mostrando _TOTAL_ Resultado",
                "sInfoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
                "sInfoFiltered": "(Filtrado um total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "oAria": {
                  "sSortAscending": ": Ative para classificar a coluna em ordem crescente",
                  "sSortDescending": ": Ative para classificar a coluna em ordem decrescente"
                }
              }
            });
          } else {
            $('.check_schedule').css("display", "none");
            $('.info-schedule').empty();
            $('#delete_schedule').empty();
            $('.display').css("display", "none");
            not_found();
          } 
        }

      });
    }
  }

  $('#date_planning').change(function (e) {
    getSelect();
  });

  $(document).ready(function () {
    var queryString = window.location.href;
    queryString = queryString.split('#')[1];

    getSelect();
    setTimeout(() => {
      getSchedule(1);
    }, 1500);
  })


  function getSelect() {
    var filters = JSON.stringify(getFilter())
    obj = getFilter();
    $.ajax({
      type: 'post',
      url: '/dashboard/schedule/load_select',
      data: {
        filters,
      },
      dataType: 'json',

      success: function (data) {
        const addMorePlaceholder = document.querySelector(".add-more-placeholder");

        let currentInputGroupts = document.querySelectorAll(".group-select");

        let lastInputsParent = [...currentInputGroupts].at(-1);
        let lastInpusGroupId = lastInputsParent ? parseInt(lastInputsParent.getAttribute("data-inputs-id"), 10) : 0;

        const userTempaaate = document.querySelector('#select-day');

        const newInputsMarkup = userTempaaate.content.cloneNode(true);
        const newInputsWrapper = newInputsMarkup.firstElementChild;

        newInputsWrapper.dataset.inputsId = lastInpusGroupId + 1;
        if (data != '') {
          addMorePlaceholder.replaceChildren(newInputsMarkup.firstElementChild);
          data.schedules.forEach(function (items, index) {
            let optionHTML = `<option value="${items.id}">  ${items.id} - ${data.availability} </option>`;
            $('#day_planning').append(optionHTML);
          })
          $(newInputsWrapper.querySelectorAll(".initSelectDay")).selectize({});

        } else {
          addMorePlaceholder.innerHTML = '';
          addMorePlaceholder.replaceChildren(newInputsMarkup.firstElementChild);
          let optionHTML = `<option selected hidden> Nenhum planejamento encontrado</option>`;
          $('#day_planning').append(optionHTML);
          $(newInputsWrapper.querySelectorAll(".initSelectDay")).selectize({});
        }
      }
    });
  }

  // Ao clicar no botao de filtrar, exibe os planejamentos com os filtros selecionados
  $('#schedule_filter_form').on('submit', function (e) {
    e.preventDefault();

    // Make Request
    getSelect();
    getSchedule(1);
  });

  function not_found() {
    let context = ``;
    context += ` 
    <section class="notf"> 
        <div class=" flex justify-center  items-center mt-10">
            <div class=" flex flex-col items-center justify-center text-center  ">
                <figure class="mb-5 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-primary/30 dark:fill-slate-600"    width="150" height="150"viewBox="0 0 24 24" fill="currentColor"><path d="M7 3V1H9V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V9H20V5H17V7H15V5H9V7H7V5H4V19H10V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7ZM17 12C14.7909 12 13 13.7909 13 16C13 18.2091 14.7909 20 17 20C19.2091 20 21 18.2091 21 16C21 13.7909 19.2091 12 17 12ZM11 16C11 12.6863 13.6863 10 17 10C20.3137 10 23 12.6863 23 16C23 19.3137 20.3137 22 17 22C13.6863 22 11 19.3137 11 16ZM16 13V16.4142L18.2929 18.7071L19.7071 17.2929L18 15.5858V13H16Z"></path></svg>
                </figure>
                <h2 class="mb-2 font-bold text-2xl text-zinc-700 dark:text-zinc-200">Nenhum planejamento encontrado nessa data.</h2>
                <p class="mb-5 font-medium text-base text-zinc-700 dark:text-zinc-200">Crie ou utilize o calendário para ver outros planejamentos.</p>
                <a class="inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 [&amp;[disabled]]:bg-foreground [&amp;[disabled]]:opacity-30 [&amp;[disabled]]:pointer-events-none lqd-btn-ghost-shadow bg-primary text-foreground shadow-xs hover:bg-primary-hover dark:hover:text-zinc-100 text-zinc-100 focus-visible:bg-primary py-2 px-4" href="/dashboard/schedule/addOrUpdate">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M12 5l0 14"></path> <path d="M5 12l14 0"></path></svg>        
            Adicionar novo
                </a>
            </div>
        </div>
    </section> `;

    $('#list_schedule').html(context);
  }

});