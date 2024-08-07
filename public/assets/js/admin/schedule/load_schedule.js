// Variaveis e dados
let pagina_atual = 1;
let request_data = {
  'date_planning': date_p,
  'type_planning': 'geral',
  'status': 'true',
  'paged': pagina_atual
}
// Ao carregar, exibe os 8 ultimos animes postados no site
$(window).on('load', function () {
  // Faz a requisicao
  set_list_schedule(request_data); 
});
// Carrega os Capitulos na pagina do chapter
function set_list_schedule(request_data) {

  jQuery.ajax({

    method: "post",
    url: "/dashboard/schedule/load",
    data: request_data,
    dataType: 'JSON',
    beforeSend: function () {
      $('#list_schedule').html('<div class="loading-post"><div class="loader"><div class="loader-wheel"></div></div></div>');
    },
    success: function (data) {
      if (!data['schedule']) {
        not_found()
      } else {
        render_schedule(data['schedule'], data);
      }
    },
    error: function (data) {
      console.log('Erro ao renderizar API da tabela.')
    },
  });

}


var timer;
function render_schedule(list, data) {

  // Limpa o html
  $('.get_table, .schedule_pagination').empty();

  let total_pages = data.total_pages;
  list.forEach(function (item, index) {
    console.log(index);
    textoContexto = ` <div class=" rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10">
    <div class="p-6 flex flex-col gap-10">
    <div class="flex justify-end gap-4">
    <a href="/dashboard/schedule/addOrUpdate/${data.id}"  id="get_day" class="font-medium text-zinc-600 dark:text-zinc-100 inline-flex"><span class=" cursor-pointer hover:bg-primary-hover bg-primary text-white px-2 py-2 font-bold  text-sm rounded-md dark:text-zinc-50">Editar Planejamento</span></a>
    <a href="/dashboard/schedule/delete/${data.id}"  id="get_day" class="font-medium text-zinc-600 dark:text-zinc-100 inline-flex"><span class=" cursor-pointer hover:bg-red-400 bg-red-600 text-white px-2 py-2 font-bold  text-sm rounded-md dark:text-zinc-50">Deletar Planejamento</span></a>
    </div>  
    
    <div class="flex items-end justify-between text-zinc-600 dark:text-zinc-100">    
         <div class="flex flex-col gap-10 "> 
    <div class="text-zinc-700 dark:text-zinc-50 text-lg flex flex-col gap-3 ">Cliente: <span class="font-bold text-zinc-600 dark:text-zinc-100">${item['client']}</span></div>
     <div  class="text-zinc-700 dark:text-zinc-50 text-base">Apos o horario de disponibilidade passar do prazo, os equipamentos da lista ficará disponivel novamente</div>
    `;

    textoContexto += ` </div>
      <div class="font-medium text-zinc-600 dark:text-zinc-100  flex flex-col  gap-3">Data do Planejamento: <span class="font-bold text-zinc-700 dark:text-zinc-50"> ${data.availability}</span></div>
        </div>
    <table id="myTable" class="display">
    <thead class="text-zinc-600 dark:text-zinc-100 bg-slate-50  w-full  ">
        <tr class="w-full">
        <th class="font-semibold">ID</th>
            <th class="font-semibold">Operador</th>
            <th class="font-semibold">Equipamento</th>
            <th class="font-semibold">Sinaleiro ou Ajudante</th>
            <th class="font-semibold">Colaborador Extra</th>
            <th class="font-semibold">Disponibilidade</th>
        </tr>
    </thead>
    <tbody>
    `;
    get_items = JSON.parse(data['schedule'][index]['values']);   
    get_items.forEach(function (items, index) {

      textoContexto +=
        `<tr class=" border-t  border-solid ">
            <td class="text-zinc-600 dark:text-zinc-100 py-6 font-medium">${items['id']}</td>
            <td  class="text-zinc-600 dark:text-zinc-100 py-6 font-medium">${items['operators']}</td>
            <td  class="text-zinc-600 dark:text-zinc-100 py-6 font-medium">${items['equipaments']}</td>
            <td  class="text-zinc-600 dark:text-zinc-100 py-6 font-medium">${items['signal_helper']}</td>
            <td  class="text-zinc-600 dark:text-zinc-100 py-6 font-medium">${items['collaborators_extras']}</td>
            <td  class="text-zinc-600 dark:text-zinc-100 py-6 font-medium inline-flex flex-col gap-1"> ${getDateTime(items['timer'], 'pt')}<span class="text-red-500  rounded-lg   text-xs inline-flex text-center justify-center">
            `;  
         
            textoContexto += ` </span>  </tr>
        `;

 
      var compareDate = new Date(items['timer']);
      compareDate.setDate(compareDate.getDate()); //just for this demo today + 7 days

      timer = setInterval(function () {
        set_Timer(compareDate);
      }, 1000);
    })
    textoContexto += `
    </tbody>
    </table> 
      </div>
    </div>`;
    // Renderiza
    $('#list_schedule').empty().fadeIn(500).append(textoContexto);
  })
  paginacao = pagination(pagina_atual, total_pages, 1);

  if (total_pages > 1) {

    paginacao.forEach(function (item, index) {
      if (item == pagina_atual) {
        $('.schedule_pagination').append(`<sa class="page-numbers current">${item}</sa>`);
      } else {
        $('schedule_pagination').append(`<sa class="page-numbers">${item}</sa>`);
      }
    });
  }
}

function getDateTime(date, locale) {
  const dateTime = new Intl.DateTimeFormat(locale, {
    weekday: "long",
    month: "short",
    day: "numeric",
    year: "numeric",
    hour: "numeric",
    minute: "numeric",
    second: "numeric",
    hour12: false, // 24-hour format
  }).format(new Date(date));
  return dateTime;
}


function get_collaborators(item) {
  item.forEach(function (items, index) {
    console.log(items);
  });
}

// Ao clicar no botao de filtrar, exibe os animes com os filtros selecionados
$('#schedule_filter_form').on('submit', function (e) {
  e.preventDefault();

  // Restarta a paginacao
  let pagina_atual = 1;
  request_data['paged'] = pagina_atual;

  // Dados que serao enviados
  request_data['type_planning'] = $('#type_planning').val();
  request_data['filter_planning'] = $('#filter_planning').val();
  request_data['date_planning'] = $('#date_planning').val();
  request_data['status'] = $('#stats_planning').val();

  set_list_schedule(request_data)
});

// Ao clicar no botao de filtrar, exibe os animes com os filtros selecionados
$('#get_day').on("click", function (e) {
  e.preventDefault();


  var ontem = new Date().setHours(-1);
  ontem = new Date(ontem)
  var dataformatada = ontem.toLocaleString();
  console.log(ontem);


  // Restarta a paginacao
  let pagina_atual = 1;
  request_data['paged'] = pagina_atual;

  // Dados que serao enviados
  request_data['type_planning'] = $('#type_planning').val();
  request_data['filter_planning'] = $('#filter_planning').val();
  request_data['date_planning'] = dataformatada;
  request_data['status'] = $('#stats_planning').val();

  set_list_schedule(request_data)
});

function pagination(currentPage, pageCount, delta = 2) {
  const separate = (a, b) => [a, ...({
    0: [],
    1: [b],
    2: [a + 1, b],
  }[b - a] || ['...', b])]

  return Array(delta * 2 + 1)
    .fill()
    .map((_, index) => currentPage - delta + index)
    .filter(page => 0 < page && page <= pageCount)
    .flatMap((page, index, {
      length
    }) => {
      if (!index) return separate(1, page)
      if (index === length - 1) return separate(page, pageCount)

      return [page]
    })
} 


function set_Timer(toDate) {
  var dateEntered = toDate;
  var now = new Date();
  var difference = dateEntered.getTime() - now.getTime();

  if (difference <= 0) {

    // Timer done
    clearInterval(timer);

  } else {

    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    $("#days").html(days);
    $("#hours").html(hours);
    $("#minutes").html(minutes);
    $("#seconds").html(seconds);
  }
}

