<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Collaborators;
use App\Models\Hoists;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Work_places;
use App\Notifications\ScheduleNot;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;
use Livewire\Component;

class ScheduleController extends Component
{
    // 

    public function __construct()
    {
    }
    public function schedulelist()
    {
        $mytime = Carbon::today()->format('Y-m-d');
        $schedules_day = Schedule::where('availability', $mytime)->get();
        return view('admin.schedule.index', compact('schedules_day'));
    }

    public function scheduleListAll()
    {
        $list = Schedule::orderBy('id', 'asc')->get();
        return view('admin.schedule.list', compact('list'));
    }

    public function scheduleAdd($id = null)
    {
        if ($id == null) {
            $template = null;
        } else {
            $template = Schedule::where('id', $id)->firstOrFail();
        }
        $clients = Clients::all();
        $collaborators = Collaborators::all();
        $hoists = Hoists::all();
        $locate_work = Work_places::where('type', 'work_place')->get();
        $responsible = Work_places::where('type', 'responsible')->get();
        $operator = Collaborators::whereIn('role', ['operador', 'guindastes Articulado', 'guindaste Articulado', 'guindaste Telescópico'])->get();
        $signal_helper = Collaborators::whereIn('role', ['ajudante', 'sinaleiro', 'ajudante Motorista', 'ajudante Geral'])->get();
        return view('admin.schedule.form', compact('template', 'clients', 'collaborators', 'hoists', 'operator', 'signal_helper', 'locate_work', 'responsible'));
    }

    public function scheduleStore(Request $request)
    {

        $string = $request->filters;

        $string = str_replace(array('\n', '\\'), '', $string);
        $string = "[" . trim($string) . "]";
        $json = json_decode($string, true);
        parse_str($json[0]['filter_data'], $arr_get);

        $data = [];
        if ($arr_get['template_id'] != 'undefined') {
            $schedule = Schedule::where('id', $arr_get['template_id'])->firstOrFail();

            $data = [];

            $i_schedule = 0;
            $array_schedule = [];

            foreach ($arr_get['equipaments'] as $inputNames) {
                $array_schedule[$i_schedule]['id'] = $i_schedule;
                $array_schedule[$i_schedule]['equipaments'] = $arr_get['equipaments'][$i_schedule];
                $array_schedule[$i_schedule]['operators'] = $arr_get['operator'][$i_schedule];
                $array_schedule[$i_schedule]['signal_helper'] = $arr_get['signal_helper'][$i_schedule];
                $array_schedule[$i_schedule]['collaborators_extras'] = $arr_get['collaborators'][$i_schedule];
                $array_schedule[$i_schedule]['work_place'] = $arr_get['work_place'][$i_schedule];
                $array_schedule[$i_schedule]['responsible'] = $arr_get['responsible'][$i_schedule];
                $array_schedule[$i_schedule]['timer'] = $arr_get['timer'][$i_schedule];
                $array_schedule[$i_schedule]['timer_f'] = $arr_get['timer_f'][$i_schedule];
                $i_schedule++;
            }

            $schedule->values = json_encode($array_schedule, JSON_UNESCAPED_SLASHES);
            $schedule->client = $arr_get['client'];
            $schedule->visible = $arr_get['visible'] ? 'true' : 'false';

            $schedule->availability = $arr_get['availability'];
 
 
                $schedule->save(); 


                return Response::json(['success' => true, 'Planejamento editado com sucesso!'], 200);
        } else {


            $i_schedule = 0;
            $array_schedule = [];

            foreach ($arr_get['equipaments'] as $inputNames) {
                $array_schedule[$i_schedule]['id'] = $i_schedule;
                $array_schedule[$i_schedule]['equipaments'] = $arr_get['equipaments'][$i_schedule];
                $array_schedule[$i_schedule]['operators'] = $arr_get['operator'][$i_schedule];
                $array_schedule[$i_schedule]['signal_helper'] = $arr_get['signal_helper'][$i_schedule];
                $array_schedule[$i_schedule]['collaborators_extras'] = $arr_get['collaborators'][$i_schedule];
                $array_schedule[$i_schedule]['work_place'] = $arr_get['work_place'][$i_schedule];
                $array_schedule[$i_schedule]['responsible'] = $arr_get['responsible'][$i_schedule];
                $array_schedule[$i_schedule]['timer'] = $arr_get['timer'][$i_schedule];
                $array_schedule[$i_schedule]['timer_f'] = $arr_get['timer_f'][$i_schedule];
                $i_schedule++;
            }

            $json_list = json_encode($array_schedule, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);


            $duplicateItems = [];
            foreach (json_decode($json_list) as $dados => $s) {
                $nomeWhere = array_filter(array_count_values([$s->operators]), function ($contagem) {
                    return $contagem;
                });
                $oollaborators = Collaborators::where('name', $nomeWhere)->where('visible', 'false')->exists();
                $equipaments = Hoists::where('model', $s->equipaments)->where('visible', 'false')->exists();

                if ($oollaborators) {
                    $duplicateItems[] = $s->operators;
                } else if ($equipaments) {
                    $duplicateItems[] = $s->equipaments;
                }
            }

            // Se houver itens duplicados, retornar uma mensagem de erro 
            if (!empty($duplicateItems)) {
                $nomesUnicos = array_filter(array_count_values($duplicateItems), function ($contagem) {
                    return $contagem;
                });
                return Response::json(['error' => true, implode(', ', array_keys($nomesUnicos)) . ' Está Indisponivel'], 200);
            }

            if (!$oollaborators && !$equipaments) {

                foreach (json_decode($json_list) as $dadoss => $re) {
                    Collaborators::where([['name', $re->operators]])->update(['visible' => 'false']);
                    Collaborators::where([['name', $re->signal_helper]])->update(['visible' => 'false']);
                    Collaborators::where([['name', $re->collaborators_extras]])->update(['visible' => 'false']);
                    Hoists::where([['model', $re->equipaments]])->update(['visible' => 'false']);
                }

                $schedule = new Schedule();
                $schedule->values = $json_list;
                $schedule->client = $arr_get['client'];
                $schedule->visible = $arr_get['visible'] ? 'true' : 'false';

                $schedule->availability = $arr_get['availability'];
                $schedule->save();

                return Response::json(['success' => true, 'Planejamento criado com sucesso!'], 200);
            }
        }
    }

    public function checkDate(Request $request)
    {


        $schedule = Schedule::orderBy('id', 'asc')->get();

        foreach ($schedule as $schedules) {
            $i = 0;
            $array = [];

            foreach (json_decode($schedules->values) as $inputName) {
                $array[$i]['id'] = $i;
                $array[$i]['equipaments'] = $inputName->equipaments;
                $array[$i]['operators'] = $inputName->operators;
                $array[$i]['signal_helper'] = $inputName->signal_helper;
                $array[$i]['timer'] = $inputName->timer;
                $array[$i]['timer_f'] = $inputName->timer_f;

                $i++;
            }

            $dataInicio = Carbon::now()->format('Y-m-d T:H:i');
            $dataFinalObj = Carbon::parse($inputName->timer_f)->format('Y-m-d T:H:i');

            if ($dataFinalObj == $dataInicio) {

                $schedule = Schedule::where([['id', $schedules->id]])->firstOrFail();

                $i_schedule = 0;
                $array_schedule = [];

                foreach (json_decode($schedule->values) as $inputNames) {

                    $array_schedule[$i_schedule]['id'] = $i;
                    $array_schedule[$i_schedule]['equipaments'] = $inputNames->equipaments;
                    $array_schedule[$i_schedule]['operators'] = $inputNames->operators;
                    $array_schedule[$i_schedule]['signal_helper'] = $inputNames->signal_helper;
                    $array_schedule[$i_schedule]['collaborators_extras'] = $inputNames->collaborators_extras;
                    $array_schedule[$i_schedule]['work_place'] = $inputNames->work_place;
                    $array_schedule[$i_schedule]['responsible'] = $inputNames->responsible;
                    $array_schedule[$i_schedule]['timer'] = $inputNames->timer;
                    $array_schedule[$i_schedule]['timer_f'] = $inputNames->timer_f;
                    $i_schedule++;
                }

                $cmd = json_encode($array_schedule, JSON_UNESCAPED_SLASHES);

                $schedule->values = $cmd;
                foreach ($array as $id_key => $dados) {

                    Hoists::where([['model', $dados['equipaments']], ['visible', 'false']])->update(['visible' => 'true']);
                    Collaborators::where([['name', $dados['operators']], ['visible', 'false']])->update(['visible' => 'true']);
                    Collaborators::where([['name', $dados['signal_helper']], ['visible', 'false']])->update(['visible' => 'true']);
                }
                $schedule->save();
            }
        }

    }

    public function scheduleData(Request $request)
    {

        $page = $request->pagina == 1 ? 0 : $request->pagina - 1;

        $string = $request->filters;

        $string = str_replace(array('\n', '\\'), '', $string);
        $string = "[" . trim($string) . "]";
        $json = json_decode($string, true);
        parse_str($json[0]['filter_data'], $arr_get);

        $stats = $arr_get['stats_planning'];
        $date_planning = $arr_get['date_planning'];
        $limit_planning = $arr_get['limit_planning'];
        $day_planning = $arr_get['day_planning'];

        $data = [];

        // Args 
        $args = ['visible' => 'true'];

        $data_Atual = Carbon::today()->format('Y-m-d');

        if ($date_planning != $data_Atual) {
            $args = ['availability' => $date_planning];
        } else if ($stats != 'true') {
            $args = ['visible' => $stats];
        }
        if ($data_Atual) {
            $args = ['id' => $day_planning];
        }

        $list = Schedule::where($args)->get();

        $total_item = sizeOf($list);

        $data['paged'] = $page;
        $data['total_results'] = $total_item;
        $data['total_pages'] = intval($total_item / $limit_planning) + 1;
        $data['item_page'] = $limit_planning;

        foreach ($list as $p) {
            $data['id'] = $p->id;
            foreach (json_decode($p->values) as $item) {
           
                $data['schedules'][] = [
                    'id' => $item->id,
                    'operator' => $item->operators,
                    'equipaments' => $item->equipaments,
                    'signal_helper' => $item->signal_helper,
                    'collaborators_extras' => $item->collaborators_extras,
                    'work_place' => $item->work_place,
                    'responsible' => $item->responsible,
                    'timer_inicio' => Carbon::parse($item->timer)->format('d-m-Y H:i'),
                    'timer_final' => Carbon::parse($item->timer_f)->format('d-m-Y H:i'),
                ];
                $data['client'] = $p->client;
                $data['availability'] = $p->availability;
            }
        }
        return $data;
    }

    public function load_select(Request $request)
    {
        $string = $request->filters;

        $string = str_replace(array('\n', '\\'), '', $string);
        $string = "[" . trim($string) . "]";
        $json = json_decode($string, true);
        parse_str($json[0]['filter_data'], $arr_get);
        $date_planning = $arr_get['date_planning'];

        $data = [];
        $list = Schedule::where('availability', $date_planning)->get();

        foreach ($list as $p) {
            $data['availability'] = Carbon::parse($p->availability)->format('d-m-Y');
            $data['schedules'][] = $p;
            $data['created_at'] = date_format($p->created_at, 'd M Y H:i');

        }
        return json_encode($data);
    }
    public function scheduleDelete($id)
    {
        $schedule = Schedule::whereId($id)->firstOrFail();
        $i = 0;
        $array = [];
        foreach (json_decode($schedule->values) as $item) {
            $array[$i]['id'] = $i;
            $array[$i]['equipaments'] = $item->equipaments;
            $array[$i]['operators'] = $item->operators;
            $array[$i]['signal_helper'] = $item->signal_helper;
            $array[$i]['collaborators_extras'] = $item->collaborators_extras;
            $i++;
        }
        foreach ($array as $id_key => $dados) {
            Hoists::where([['model', $dados['equipaments']], ['visible', 'false']])->update(['visible' => 'true']);
            Collaborators::where([['name', $dados['operators']], ['visible', 'false']])->update(['visible' => 'true']);
            Collaborators::where([['name', $dados['collaborators_extras']], ['visible', 'false']])->update(['visible' => 'true']);
            Collaborators::where([['name', $dados['signal_helper']], ['visible', 'false']])->update(['visible' => 'true']);
        }

        $schedule->delete();
        return back()->with(['message' => 'Deleted Successfully', 'type' => 'success']);
    }
    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
