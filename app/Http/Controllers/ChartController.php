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
        $response = array();
        for ($i = 0; $i < 7; $i++) {
            $dayOfWeek = Carbon::today()->subDays($i);
            // $trainersForThisDay = Trainer::where('created_at', 'LIKE', $dayOfWeek);
            // $response[$dayOfWeek] = $trainersForThisDay->count();
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = Carbon::today()->subDays($i)->format('M') . ' ' . Carbon::today()->subDays($i)->day;
            $jsonArrayItem['value'] = Trainer::whereDate('created_at', $dayOfWeek->toDateString())->count();
            array_push($response, $jsonArrayItem);
        }
        $response = array_reverse($response);

        return response()->json([$response]);
    }

    public function dataPush($label, $value)
    {
        $jsonArrayItem = array();
        $jsonArrayItem['label'] = $label;
        $jsonArrayItem['value'] = $value;

        return $jsonArrayItem;
    }
}
