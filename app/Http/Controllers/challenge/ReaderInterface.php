<?php
/**
 * Created by PhpStorm.
 * User: lichuncheng
 * Date: 2018/5/13
 * Time: 15:53
 */

namespace App\Http\Controllers\challenge;


interface ReaderInterface
{
    // 打开文档
    public function readFile();
}