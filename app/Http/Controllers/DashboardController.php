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
                $list = Collaborators::where('visible', $stats)->get();
            } else {
                $list = Collaborators::whereDate('updated_at', '<', Carbon::parse($datatime))->where('visible', $stats)->get();
            }
        } else if ($type == 'equipaments') {
            if ($stats == 'false') { 
                $lists = Hoists::where('visible', $stats)->get();
            } else {

                $lists = Hoists::whereDate('updated_at', '<', Carbon::parse($datatime))->where('visible', $stats)->get();
            }
        }

        $timer_i = 'Sem data de inicio';
        $timer_f = 'Sem data final';
        $clientes = "<span class='clients'> Nenhum Cliente relacionado</span> ";


        if ($type == 'collaborators') {
            $timer_i = Carbon::parse($datatime)->format('Y-m-d');
            $timer_f = Carbon::parse($datatime)->format('Y-m-d');

            foreach ($list as $p) {
                if ($p->visible == 'true') {
                    $visible = '<span class="disp"> Disponivel</span>';
                } else {
                    $visible = '<span class="indisp">Indisponivel</span>';
                }


                if ($stats == 'true') {
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
                    $asch = Schedule::all(); 
                    foreach ($asch as $va) {  
                        foreach (json_decode($va->values) as $id_key => $shce) {
                          
                            $newS = Schedule::where('availability', $datatime)->get();
                            if ( (isset($shce->signal_helper) && $shce->signal_helper === $p->name) ||  (isset($shce->operators) && $shce->operators === $p->name)) {
                              
                                $clientes = "<span class='clients_indisp'>$va->client</span>";
                                $timer_i = Carbon::parse($shce->timer)->format('d-m-Y H:i');
                                $timer_f = Carbon::parse($shce->timer_f)->format('d-m-Y H:i');

                                if (Carbon::parse($datatime)->format('Y-m-d') >= Carbon::parse($shce->timer)->format('Y-m-d') && Carbon::parse($datatime)->format('Y-m-d') <= Carbon::parse($shce->timer_f)->format('Y-m-d')) {
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
                        }

                    }
                }
            }
            $data['type'] = $type;
            $data['total_schedule'] = sizeOf($list);
        } else {
            foreach ($lists as $ps) {
                if ($ps->visible == 'true') {
                    $visible = '<span class="disp"> Disponivel</span>';
                } else {
                    $visible = '<span class="indisp">Indisponivel</span>';
                }
                if ($stats == 'true') {
                    $data['data'][] = [
                        'id' => $ps->id,
                        'name' => $ps->model,
                        'frotas' => $ps->frotas,
                        'role' => ucfirst($ps->type),
                        'visible' => $visible,
                        'timer_i' => $timer_i,
                        'timer_f' => $timer_f,
                        'cliente' => $clientes,
                    ];
                } else {
                    if ($ps->visible == 'true') {
                        $visible = '<span class="disp"> Disponivel</span>';
                    } else {
                        $visible = '<span class="indisp">Indisponivel</span>';
                    } 
                    $eqqs = Schedule::all(); 
                    foreach ($eqqs as $va) {  
                        foreach (json_decode($va->values) as $id_key => $eq) {
                           
                            if ( (isset($eq->equipaments) && $eq->equipaments === $ps->model)) {
                              
                                $clientes = "<span class='clients_indisp'>$va->client</span>";
                                $timer_i = Carbon::parse($eq->timer)->format('d-m-Y H:i');
                                $timer_f = Carbon::parse($eq->timer_f)->format('d-m-Y H:i');

                                if (Carbon::parse($datatime)->format('Y-m-d') >= Carbon::parse($eq->timer)->format('Y-m-d') && Carbon::parse($datatime)->format('Y-m-d') <= Carbon::parse($eq->timer_f)->format('Y-m-d')) {
                                  
                                    $data['data'][] = [
                                        'id' => $ps->id,
                                        'name' => $ps->model,
                                        'frotas' => $ps->frotas,
                                        'role' => ucfirst($ps->type),
                                        'visible' => $visible,
                                        'timer_i' => $timer_i,
                                        'timer_f' => $timer_f,
                                        'cliente' => $clientes,
                                    ];
                                }

                            }
                        }

                    }
                   
                }
            }
            $data['type'] = $type;
            $data['total_schedule'] = sizeOf($lists);
        }
        return json_encode($data);
    }
}
