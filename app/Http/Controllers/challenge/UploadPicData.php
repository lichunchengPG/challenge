<?php

namespace App\Http\Controllers\challenge;

/**
 * Created by PhpStorm.
 * User: lichuncheng
 * Date: 2018/5/11
 * Time: 14:44
 */
class UploadPicData implements DataTransformInterface
{
    use DataTransForm;

    public $docData;  // 文档数据

    public function __construct($data)
    {
        $this->docData = $data;

    }

    // 实现数据转化方法
    public function setBackdrop()
    {
        return $this->customArray($this->docData);
    }
}