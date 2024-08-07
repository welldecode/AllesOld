 
document.addEventListener('DOMContentLoaded', function () {
 
  // Função responsvel por lista e criar um objeto com todos filtros
  function getFilter() {

    var filter_data = $('#schedule_form').serialize()
    // Valores da lista li de generos 

    var filter_obj = {
      filter_data: filter_data,
    }

    return filter_obj
  } 

  function getSchedule(page) {
    if (page > 0) {
      var filters = JSON.stringify(getFilter())
      obj = getFilter();
      window.history.replaceState(null, null, window.location.pathname + "?" + obj['filter_data'] + '&pagina=' + page  );
      $.ajax({
        type: "post",
        url: "/dashboard/schedule/schedule",
        data: {
          pagina: page,
          filters: filters
        },
        dataType: 'json',
        beforeSend: function () {

          $('.info-schedule').html('<div class="loading-post"><div class="loader"><div class="loader-wheel"></div></div></div>');

          $('#delete_schedule').empty();
          $('.display').css("display", "none");

          var posicaoIr = $('.info-schedule').offset().top;
          posicaoIr = posicaoIr - 64;
          window.scrollTo({ top: posicaoIr, behavior: 'smooth' });
        },

        success: function (data) {
          current = parseInt(page);
          if (data.data) { 
            $('.info-schedule').empty();
            $('.notf').empty(); 
            console.log(data )
 
              
            $('.display').css("display", "block");
            $('#demo').DataTable({
              destroy: true,
              data: data['data'],
              columns: [
                { data: 'id' },
                { data: 'name' }, 
                { data: 'role' },  
                { data: 'visible' },
                { data: 'timer_i' }, 
                { data: 'timer_f' }, 
                { data: 'cliente' }, 
              ],
              lengthChange: false,
              pageLength: data['item_page'],
              responsive: true,
              "language": {
                "sProcessing": "Carregando...",
                "sLengthMenu": "_MENU_",
                "sZeroRecords": "Nenhum colaborador encontrado",
                "sEmptyTable": "Nenhum colaborador encontrado no sistema.",
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
            $('.info-schedule').empty();
            $('#delete_schedule').empty();
            $('.display').css("display", "none");
            not_found();
          }

        }

      });
    }
  }
  setTimeout(() => {
    getSchedule(1);
  }, 1000);


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


  // Ao clicar no botao de filtrar, exibe os planejamentos com os filtros selecionados
  $('#schedule_form').on('submit', function (e) {
    e.preventDefault();
 
    getSchedule(1);
  });


});
