<?php

namespace App\Traits;

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;

trait DateTrait
{
    public function datePtBR($var) {
        return date('d/m/Y', strtotime($var));
    }

    function getSundays($y, $m) {
        return new DatePeriod(
            new DateTime("first sunday of $y-$m"),
            DateInterval::createFromDateString('next sunday'),
            new DateTime("last day of $y-$m")
        );
    }

    public function getAlternativeSunday($y, $m, $i) {
        if ($i % 2 == 0) {
            return new DatePeriod(
                new DateTime("first sunday of $y-$m"),
                DateInterval::createFromDateString('2 weeks'),
                new DateTime("last day of $y-$m")
            );
        }

        else {
            return new DatePeriod(
                new DateTime("second sunday of $y-$m"),
                DateInterval::createFromDateString('2 weeks'),
                new DateTime("last day of $y-$m")
            );
        }
    }

    public function getDates($y, $m, $d) {
        return new DatePeriod(
            new DateTime("first $d of $y-$m"),
            DateInterval::createFromDateString("next $d"),
            new DateTime("last day of $y-$m 00:01")
        );
    }

    public function getDatesBetween($from, $to) {
        return new DatePeriod(
            new DateTime("$from"),
            new DateInterval('P1D'),
            new DateTime("$to 00:01")
        );
    }

    public function getMonthMysql($d) {
        return substr($d, 5, -3);
    }

    public function getMonthAndYearMysql($d) {
        return substr($d, 0, -3);
    }

    public function scopeAddOneDay($d) {
        return date('Y-m-d', strtotime($d. ' + 1 days'));
    }

    public function scopeAddOneMonth($d) {
        return date('Y-m', strtotime($d. ' + 1 months'));
    }

    public function dayEnToPt($d) {
        $c = Carbon::parse($d)->locale('pt-BR');
        return ucfirst(str_replace('-feira', '', $c->getTranslatedDayName('dddd')));
    }

    public function dayPtToMysql($d) {
        if ($d) return date('Y-m-d', strtotime(str_replace("/", "-", $d)));
        return null;
    }

    function currentDate() {
        $date_array = array(
            'ptBR'             => date('d/m/Y'),
            'mysql'            => date('Y-m-d'),
            'ptBRext'          => ucfirst(strftime('%A, %d de ', strtotime('today'))).ucfirst(strftime('%B de %Y', strtotime('today'))),
            'monthYearPtBRext' => ucfirst(strftime('%B')) . ' de ' . date('Y'),
            'nextMonthPtBRext' => ucfirst(strftime('%B', strtotime('+1 month'))),
            'nextYearMysql'    => date_format(date_add(date_create(), date_interval_create_from_date_string('1 year')), "Y-m-d"),
        );
        return $date_array;
    }

    function date($d) {
        if ($d == 'nextYear')         return date_format(date_add(date_create(), date_interval_create_from_date_string('1 year')), "Y-m-d");
        if ($d == 'ptBRext')          return ucfirst(strftime('%A, %d de ', strtotime('today'))).ucfirst(strftime('%B de %Y', strtotime('today')));
        if ($d == 'monthYearPtBRext') return ucfirst(strftime('%B')) . ' de ' . date('Y');
        if ($d == 'nextMonthPtBRext') return ucfirst(strftime('%B', strtotime('+1 month')));
    }

    public function carbonNow() {
        return Carbon::now()->timezone('America/Sao_Paulo')->toDateTimeString();
    }
}
?>
