<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Currency;

class FixerController extends Controller
{
    const UPDATE_TIME = 60;

    public function form()
    {

        $data = Currency::orderBy('currency')->get()->pluck('currency')->all();
        return view('fixer.form', ['data' => $data]);
    }

    public function formSubmit(Request $request)
    {
        // $data = Http::acceptJson()->get(
        //     'http://data.fixer.io/api/latest',
        //     ['access_key' => env('FIXER_API')]
        // )
        //     ->json();



        //     $time = (int) time();
        //     foreach ($data['rates'] as $currency => $rate) {
        //         Currency::updateOrCreate(
        //             ['currency' => $currency],
        //             ['rate' => (float) $rate, 'time' => $time]
        //         );
        //     }
        //     dd($data);
        $currency = Currency::where('currency', $request->currency)->first();
        $updated = '';

        //check if needs update
        if ($currency->time + self::UPDATE_TIME < time()) {
            $data = Http::acceptJson()->get(
                'http://data.fixer.io/api/latest',
                ['access_key' => env('FIXER_API')]
            )
                ->json();



            $time = (int) time();
            foreach ($data['rates'] as $currency => $rate) {
                Currency::updateOrCreate(
                    ['currency' => $currency],
                    ['rate' => (float) $rate, 'time' => $time]
                );
            }
            $currency = Currency::where('currency', $request->currency)->first();
            $updated = 'currency was updated';
        }

        if ($request->eur_value) {
            $eur = (float) $request->eur_value;
            $value = $currency->rate * $eur;
        } else {
            $value = (float) $request->value;
            $eur = $value / $currency->rate;
        }

        return redirect()->back()->with('eur_value', $eur)->with('value', $value)->with('updated', $updated)->with('currency', $currency->currency);
    }
}
