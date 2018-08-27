<?php
/**
 * Created by PhpStorm.
 * User: rufus
 * Date: 26.08.2018
 * Time: 13:41
 */

namespace App\Services;


class ResultChecker
{
    public function checker($data)
    {
        if(!$data) {
            $data[0] = "No such results";
            return array ($data, false);
        }
        return array ($data, true);
    }

}