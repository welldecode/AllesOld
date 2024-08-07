<?php

namespace App\Http\Resources;
use App\Models\Hoists;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ScheduleResource  extends Model {

    public function checkDate()
    { 
        $schedule = Schedule::all(); 
        $i = 0;
        $array = [];
        if (Schedule::first() !== null) {
            foreach ($schedule as $schedules) {
                foreach (json_decode($schedules->values) as $inputName) {
                    $array[$i]['id'] = $i;
                    $array[$i]['timer'] = $inputName->timer;
                    $array[$i]['operators'] = $inputName->operators;
                    $array[$i]['equipaments'] = $inputName->equipaments;
                    $array[$i]['signal_helper'] = $inputName->signal_helper;
                    $array[$i]['collaborators_extras'] = $inputName->collaborators_extras;
                    $i++;
                }
                $today = Carbon::now()->format('Y-m-d T:H:i'); 
                $timern = Carbon::parse($inputName->timer)->format('Y-m-d T:H:i');
                if ($timern == $today) {
                    return Hoists::where([['model', $inputName->equipaments]])->update(['visible' => 'true']);
                }
            }
        }
    }

}

 