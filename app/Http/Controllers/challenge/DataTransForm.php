<?php
/**
 * Created by PhpStorm.
 * User: lichuncheng
 * Date: 2018/5/12
 * Time: 17:39
 */

namespace App\Http\Controllers\challenge;


trait DataTransForm
{

    // 自定义符号
    public $customChar = ['##', '~~~'];

    // 格式转化
    public function customArray($array)
    {
        $match = 0;  // 是否匹配
        $result = [];  // 存放结果
        $tmpKey = '';
        foreach ($array as $index => $value) {

            $value = trim($value);
            if (in_array($value, $this->customChar)) {
                $match == 1;
                $tmpKey = $value;
            } else {
                $result[$tmpKey] = isset($result[$tmpKey]) ? $result[$tmpKey]. $value : $value;
                $match == 0;
            }
        }

        dd($result);
        return $result;
    }

}