<?php

namespace Petro\Http\Controllers;

use Illuminate\Http\Request;

use Petro\Trainer;
use Charts;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        $internal_count = Trainer::where('type', 'Internal')->count();
        $external_count = Trainer::where('type', 'External')->count();

        return view('report.index', compact('internal_count', 'external_count'))->with('response', json_decode($response, true));;
    }

    public function getTrainerCount7Days(Request $request)
    {
        // $today = Carbon::today();
        // $response = array();
        // for ($i = 7; $i !=  0; $i--) {
        //     $upperLimit = Carbon::create($today->year, $today->month, $today->day, 23, 59, 59);
        //     $count = Trainer::whereBetween('created_at', [$today->subDays($i), $upperLimit])->count();
        //     $jsonArrayItem = array();
        //     $jsonArrayItem['label'] = $today->format('M') . ' ' . $today->subDays($i)->day;
        //     $jsonArrayItem['value'] = $count;
        //     array_push($response, $jsonArrayItem);
        // }

        // Need optimization
        $response = array();
        
        $today = Carbon::today();
        $upperLimit = Carbon::create($today->year, $today->month, $today->subDays(6)->day, 23, 59, 59);
        $today = Carbon::today();
        $count = Trainer::whereBetween('created_at', [$today->subDays(6), $upperLimit])->count();
        $today = Carbon::today();
        array_push($response, $this->dataPush($today->format('M') . ' ' . $today->subDays(6)->format('d'), $count));
        
        $today = Carbon::today();
        $upperLimit = Carbon::create($today->year, $today->month, $today->subDays(5)->day, 23, 59, 59);
        $today = Carbon::today();
        $count = Trainer::whereBetween('created_at', [$today->subDays(5), $upperLimit])->count();
        $today = Carbon::today();
        array_push($response, $this->dataPush($today->format('M') . ' ' . $today->subDays(5)->format('d'), $count));
        
        $today = Carbon::today();
        $upperLimit = Carbon::create($today->year, $today->month, $today->subDays(4)->day, 23, 59, 59);
        $today = Carbon::today();
        $count = Trainer::whereBetween('created_at', [$today->subDays(4), $upperLimit])->count();
        $today = Carbon::today();
        array_push($response, $this->dataPush($today->format('M') . ' ' . $today->subDays(4)->format('d'), $count));
        
        $today = Carbon::today();
        $upperLimit = Carbon::create($today->year, $today->month, $today->subDays(3)->day, 23, 59, 59);
        $today = Carbon::today();
        $count = Trainer::whereBetween('created_at', [$today->subDays(3), $upperLimit])->count();
        $today = Carbon::today();
        array_push($response, $this->dataPush($today->format('M') . ' ' . $today->subDays(3)->format('d'), $count));
        
        $today = Carbon::today();
        $upperLimit = Carbon::create($today->year, $today->month, $today->subDays(2)->day, 23, 59, 59);
        $today = Carbon::today();
        $count = Trainer::whereBetween('created_at', [$today->subDays(2), $upperLimit])->count();
        $today = Carbon::today();
        array_push($response, $this->dataPush($today->format('M') . ' ' . $today->subDays(2)->format('d'), $count));
        
        $today = Carbon::today();
        $upperLimit = Carbon::create($today->year, $today->month, $today->subDays(1)->day, 23, 59, 59);
        $today = Carbon::today();
        $count = Trainer::whereBetween('created_at', [$today->subDays(1), $upperLimit])->count();
        $today = Carbon::today();
        array_push($response, $this->dataPush($today->format('M') . ' ' . $today->subDays(1)->format('d'), $count));
        
        $today = Carbon::today();
        $upperLimit = Carbon::create($today->year, $today->month, $today->subDays(0)->day, 23, 59, 59);
        $today = Carbon::today();
        $count = Trainer::whereBetween('created_at', [$today->subDays(0), $upperLimit])->count();
        $today = Carbon::today();
        array_push($response, $this->dataPush($today->format('M') . ' ' . $today->subDays(0)->format('d'), $count));

        return response()->json($response);
    }

    public function dataPush($label, $value)
    {
        $jsonArrayItem = array();
        $jsonArrayItem['label'] = $label;
        $jsonArrayItem['value'] = $value;

        return $jsonArrayItem;
    }
}
