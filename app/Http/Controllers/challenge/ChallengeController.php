<?php
/**
 * Created by PhpStorm.
 * User: lichuncheng
 * Date: 2018/5/11
 * Time: 16:26
 */

namespace App\Http\Controllers\challenge;


class ChallengeController
{
    public function index()
    {
        $path = public_path('challenge1.txt');
        $type = '12';
        $reader = new DataHandler($path,$type);
        $reader->writeData();
    }
}