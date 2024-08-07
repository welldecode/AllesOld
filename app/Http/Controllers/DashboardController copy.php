<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Collaborators;
use App\Models\Document;
use App\Models\Hoists;
use App\Models\Schedule;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function index()
    {
        $today = Carbon::today();
        $clients = Clients::all();
        $collaborators = Collaborators::all();
        $hoists = Hoists::all();
        $schedule = Schedule::all();
        $schedules = Schedule::where('created_at', '>', $today->subDays(7))->get();
        $documents = Document::where('created_at', '>', $today->subDays(7))->get();
        return view('admin.dashboard', compact('clients', 'collaborators', 'schedule', 'hoists', 'schedules', 'documents'));
    }

    public function schedule(Request $request)
    {
        $page = $request->pagina == 1 ? 0 : $request->pagina - 1;

        $string = $request->filters;
        $string = str_replace(array('\n', '\\'), '', $string);
        $string = "[" . trim($string) . "]";
        $json = json_decode($string, true);
        parse_str($json[0]['filter_data'], $arr_get);

        $data = [];
        $datatime = $arr_get['start_date'];
        $type = $arr_get['type_col'];
        $stats = $arr_get['stats'];

        if ($type == 'collaborators') {
            if ($stats == 'false') {

                $list = Collaborators::whereDate('updated_at', '>=', Carbon::parse($datatime))->where('visible', $stats)->get();
            } else {

                $list = Collaborators::whereDate('updated_at', '<', Carbon::parse($datatime))->where('visible', $stats)->get();
            }
        } else if ($type == 'equipaments') {
            if ($stats == 'false') {

                $lists = Hoists::whereDate('updated_at', '>=', Carbon::parse($datatime))->where('visible', $stats)->get();
            } else {

                $lists = Hoists::whereDate('updated_at', '<', Carbon::parse($datatime))->where('visible', $stats)->get();
            } 
        }


        if ($type == 'collaborators') {
            
            $timer_i = Carbon::parse($datatime)->format('Y-m-d');
            $timer_f = Carbon::parse($datatime)->format('Y-m-d');

            foreach ($list as $p) {

                $asch = Schedule::where('visible', 'true')->get();


                foreach ($asch as $va) {
                    foreach (json_decode($va->values) as $shce) {
                        if (isset($shce->operators) && $shce->operators === $p->name) {
                            $clientes = "<span class='clients_indisp'>$va->client</span>";
                            $timer_i = Carbon::parse($shce->timer)->format('d-m-Y H:i');
                            $timer_f = Carbon::parse($shce->timer_f)->format('d-m-Y H:i');

                        }
                    }
                }

                if ($p->visible == 'true') {
                    $visible = '<span class="disp"> Disponivel</span>';
                } else {
                    $visible = '<span class="indisp">Indisponivel</span>';
                }

                if (Schedule::isDateInCycle($datatime, Carbon::parse($shce->timer)->format('Y-m-d'), Carbon::parse($shce->timer_f)->format('Y-m-d'))) {
                    $timer_i = Carbon::parse($shce->timer)->format('d-m-Y H:i');
                    $timer_f = Carbon::parse($shce->timer_f)->format('d-m-Y H:i');

                    $clientes = "<span class='clients'> Nenhum Cliente relacionado</span> ";

                    $data['data'][] = [
                        'id' => $p->id,
                        'availability' => Carbon::parse($p->availability)->format('d-m-Y'),
                        'name' => $p->name,
                        'email' => $p->email,
                        'cliente' => $clientes,
                        'timer_i' => $timer_i,
                        'timer_f' => $timer_f,
                        'role' => ucfirst($p->role),
                        'visible' => $visible,
                    ];
                } else {

                    $timer_i = 'Sem data de inicio';
                    $timer_f = 'Sem data final';
                    $clientes = "<span class='clients'> Nenhum Cliente relacionado</span> ";

                    $data['data'][] = [
                        'id' => $p->id,
                        'availability' => Carbon::parse($p->availability)->format('d-m-Y'),
                        'name' => $p->name,
                        'email' => $p->email,
                        'cliente' => $clientes,
                        'timer_i' => $timer_i,
                        'timer_f' => $timer_f,
                        'role' => ucfirst($p->role),
                        'visible' => $visible,
                    ];
                }
            }
            $data['type'] = $type;
            $data['total_schedule'] = sizeOf($list);
        } else {
            foreach ($lists as $ps) {

                $asch = Schedule::where('visible', 'true')->get();

                foreach ($asch as $va) {
                    foreach (json_decode($va->values) as $shce) {
                        if (isset($shce->equipaments) && $shce->equipaments === $ps->model) {
                            $clientes = "<span class='clients_indisp'>$va->client</span>";
                            $timer_i = Carbon::parse($shce->timer)->format('d-m-Y H:i');
                            $timer_f = Carbon::parse($shce->timer_f)->format('d-m-Y H:i');
                        }
                    }
                }

                if ($ps->visible == 'true') {
                    $visible = '<span class="disp"> Disponivel</span>';
                } else {
                    $visible = '<span class="indisp">Indisponivel</span>';
                }
                if (Schedule::isDateInCycle($datatime, Carbon::parse($shce->timer)->format('Y-m-d'), Carbon::parse($shce->timer_f)->format('Y-m-d'))) {

                    $timer_i = 'Sem data de inicio';
                    $timer_f = 'Sem data final';
                    $clientes = "<span class='clients'> Nenhum Cliente relacionado</span> ";

                    $data['data'][] = [
                     
                    'id' => $ps->id,
                    'model' => $ps->model,
                    'frotas' => $ps->frotas,
                    'tipo' => ucfirst($ps->type),
                    'visible' => $visible,
                    'timer_i' => $timer_i,
                    'timer_f' => $timer_f,
                    'cliente' => $clientes,
                    ];
                } else {

                    $timer_i = 'Sem data de inicio';
                    $timer_f = 'Sem data final';
                    $clientes = "<span class='clients'> Nenhum Cliente relacionado</span> ";

                    $data['data'][] = [
                        'id' => $ps->id,
                        'model' => $ps->model,
                        'frotas' => $ps->frotas,
                        'tipo' => ucfirst($ps->type),
                        'visible' => $visible,
                        'timer_i' => $timer_i,
                        'timer_f' => $timer_f,
                        'cliente' => $clientes,
                    ];
                }
           
            }
            $data['type'] = $type;
            $data['total_schedule'] = sizeOf($lists);
        }
        return json_encode($data);
    }
}
