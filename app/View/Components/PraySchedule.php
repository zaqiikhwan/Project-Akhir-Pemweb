<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Carbon\Carbon;

class PraySchedule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function getSchedule($year, $month, $day)
    {
        $response = Http::get('https://api.myquran.com/v1/sholat/jadwal/1619/'.$year.'/'.$month.'/'.$day);

        if ($response->successful()) {
            $data = $response->json();
            return response()->json($data);
        } else {
            $statusCode = $response->status();
            $errorMessage = $response->body();
            return response()->json(['error' => $errorMessage], $statusCode);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $currentDate = Carbon::now();
        $year = $currentDate->year;
        $month = $currentDate->month;
        $day = $currentDate->day;
        $formattedDate = $currentDate->format('l, Y M d');
        $schedule = $this->getSchedule($year, $month, $day);
        $data = [
            $schedule->original['data']['jadwal']['subuh'],
            $schedule->original['data']['jadwal']['dzuhur'],
            $schedule->original['data']['jadwal']['ashar'],
            $schedule->original['data']['jadwal']['maghrib'],
            $schedule->original['data']['jadwal']['isya'],
        ];

        return view('components.pray-schedule',
            ["schedule"=>$data,
            "date"=>$formattedDate]);
    }
}
