<?php
/**
 * Created by PhpStorm.
 * User: lichuncheng
 * Date: 2018/5/13
 * Time: 15:51
 */

namespace App\Http\Controllers\challenge;


class TxtReader implements ReaderInterface
{
    public $path; // 文档路径

    public function __construct($path)
    {
       $this->path = $path;
    }

    // 读取txt文档数据
    public function readFile()
    {
        // txt 类型
        $content = file_get_contents($this->path);
        // 判断格式
        $encode_type = mb_detect_encoding($content, array("ASCII","GB2312","GBK","UTF-8"));
        // 转化格式
        $content = mb_convert_encoding($content, 'UTF-8', $encode_type);
        $content = trim($content);
        // 字符串拆分成数组
        $file_array = explode("\r\n", $content);

        return $file_array;
    }

}