<?php
/**
 * Created by PhpStorm.
 * User: Faby's
 * Date: 20/1/2018
 * Time: 12:52 AM
 */

namespace App\Search\Filters;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class FechaPubFilter implements Filter
{

    /**
     * @param Builder $builder
     * @param $value
     * @return mixed
     */
    public static function apply(Builder $builder, $value)
    {
//        return $value;
        return $builder->where('fecha_pub', Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d'));
    }
}