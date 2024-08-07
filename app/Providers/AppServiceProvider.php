<?php

namespace App\Providers;

use App\Events\ScheduleCheck;
use App\Events\ScheduleNotification;
use App\Http\Controllers\ScheduleController;
use App\Http\Resources\ScheduleResource;
use App\Models\Collaborators;
use App\Models\User;
use App\Notifications\ScheduleNot;
use DateTime;
use Illuminate\Support\Facades\Notification;
use App\Models\Hoists;
use App\Models\Schedule;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->register(ViewServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->useLangPath( base_path('lang'));   
 
    }



    public function forceSchemeHttps(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }

    public function checkDate()
    {
        $schedule = Schedule::all();

        if (Schedule::first() !== null) {

            foreach ($schedule as $schedules) {
                $i = 0;
                $array = [];

                foreach (json_decode($schedules->values) as $inputName) {
                    $array[$i]['id'] = $i;
                    $array[$i]['equipaments'] = $inputName->equipaments;
                    $array[$i]['operators'] = $inputName->operators;
                    $array[$i]['signal_helper'] = $inputName->signal_helper;
                    $array[$i]['collaborators_extras'] = $inputName->collaborators_extras;
                    $array[$i]['work_place'] = $inputName->work_place;
                    $array[$i]['responsible'] = $inputName->responsible;
                    $array[$i]['timer'] = $inputName->timer;
                    $array[$i]['timer_f'] = $inputName->timer_f;
                    $i++;
                }

                // Converte as strings de data para objetos DateTime

                $dataInicioObj = Carbon::parse($inputName->timer)->format('Y-m-d T:H:i');

                $dataInicio = Carbon::now()->format('Y-m-d T:H:i');
                $dataFinalObj = Carbon::parse($inputName->timer_f)->format('Y-m-d T:H:i');

                // Compara as datas
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
    }
}

