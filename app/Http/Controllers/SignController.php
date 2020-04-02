<?php

namespace App\Http\Controllers;

use App\Sign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignController extends Controller
{
    //
    public function show($number = null) {
        if ($number !== null) {
            $sign = Sign::where('number', $number)->first();
            $horoscopes = $sign->dailyRecords()->orderByDesc('created_at')->first();
            $pastRecords = DB::table('daily_records')
                ->where('sign_id', $sign->id)
                ->where('date', '!=', Carbon::today())
                ->groupBy('date')
                ->get();
            return view('astros', [
                'sign' => $sign,
                'signs' => null,
                'horoscopes' => $horoscopes,
                'past_horo' => $pastRecords
            ]);
        } else {
            $signs = Sign::all();
            foreach ($signs as $sign) {
                $sign->horoscopes = $sign->dailyRecords()->orderByDesc('created_at')->first();
            }
            return view('astros', [
                'sign' => null,
                'signs' => $signs,
                'horoscopes' => null,
                'past_horo' => null
            ]);
        }
    }
}
