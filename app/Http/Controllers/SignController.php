<?php

namespace App\Http\Controllers;

use App\Sign;
use Illuminate\Http\Request;

class SignController extends Controller
{
    //
    public function show($id = null) {
        if ($id) {
            $sign = Sign::find($id);
            $horoscopes = $sign->dailyRecords()->get();
            return view('astros', ['sign' => $sign, 'signs' => null, 'horoscopes' => $horoscopes]);
        } else {
            $signs = Sign::all();
            foreach ($signs as $sign) {
                $sign->horoscopes = $sign->dailyRecords()->orderByDesc('created_at')->first();
            }
            return view('astros', ['sign' => null, 'signs' => $signs, 'horoscopes' => null]);
        }
    }
}
