<?php

namespace App\Models;

use Carbon\{CarbonPeriod, Carbon};
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public static function getRates($progress = false){
        $result = [];
        $period = new CarbonPeriod( Carbon::today()->subYears(5), Carbon::today());
        $currencies = ['USD', 'EUR', 'CZK', 'KZT'];

        foreach ($period as $date){
            $info = Http::get('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange', [
                'date' => $date->format('Ymd'),
                'json'  => ''
            ])->json();

            $ids =[];
            $column= array_column($info, 'cc');

            foreach ($currencies as $currency){
                $ids[$currency] = array_search($currency, $column);
            }

            array_push($result, [
                'USD'      => $info[$ids['USD']]['rate'],
                'EUR'      => $info[$ids['EUR']]['rate'],
                'CZK'      => $info[$ids['CZK']]['rate'],
                'KZT'      => $info[$ids['KZT']]['rate'],
                'date'      => $date->format('Y-m-d')
            ]);

            if($progress) echo $date->format('Y-m-d') .' of '.$period->last()->format('Y-m-d').PHP_EOL;
        }
        self::insert($result);
    }
}
