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
    // 分段符
    public $paragraph = '=====';

    // 格式转化
    public function customArray($array)
    {
        $match = 0;  // 是否匹配
        $result = [];  // 存放结果
        $tmp_array = [];
        $tmpKey = '';
        foreach ($array as $index => $value) {

            $value = trim($value);
            if (in_array($value, $this->customChar)) {
                // 判断自定义符号
                $match == 1;
                $tmpKey = $value;
            } elseif ($value == $this->paragraph) {
                // 分段
                $result[] = $tmp_array;
                $tmp_array = [];
            } else {
                // 内容拼接
                $tmp_array[$tmpKey] = isset($tmp_array[$tmpKey]) ? $tmp_array[$tmpKey]. $value : $value;
                $match == 0;
            }
        }

        return $result;
    }

}