<?php
/**
 * Created by PhpStorm.
 * User: lichuncheng
 * Date: 2018/5/13
 * Time: 15:51
 */

namespace App\Http\Controllers\challenge;

class DocReader implements ReaderInterface
{
    public $path; // 文档路径

    public function __construct($path)
    {
       $this->path = $path;
    }

    // 读取doc文档数据
    public function readFile()
    {
        // 打开word文档
        $content = shell_exec('/home/vagrant/bin/antiword -m UTF-8 '.$this->path);
        $content = trim($content);
        // 字符串拆分成数组
        $file_array = explode("\n", $content);

        return $file_array;
    }

}