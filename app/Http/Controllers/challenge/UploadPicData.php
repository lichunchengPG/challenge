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

    // 获取转化后的数据
    public function getData()
    {
       $backdrop = $this->setBackdrop();
       $answer_area = $this->setAnswerArea();
       $result_data = $this->setResult();
       $result = ['backdrop' => $backdrop, 'answer_area' => $answer_area, 'result' => $result_data];

       return json_encode($result, JSON_UNESCAPED_UNICODE);
    }


    // 设置backdrop数据
    public function setBackdrop()
    {
        $docData =  $this->customArray($this->docData);
        $result = [];
        $temp = [];
        foreach ($docData as $data) {
            foreach ($data as $key => $item) {
                // title
                if ($key == '##') {
                    $temp = $temp + ['title' => $item];
                }
                // html段
                if ($key == '~~~') {
                    $temp = $temp + ['body' => $item];
                }
            }
            $result[] = $temp;
            $temp = [];
        }

        return $result;
    }

    // 设置answer_area数据
    public function setAnswerArea()
    {
        // 图片类型
        $pic_type['type'] = 'images';
        $pic_type['title'] = '提交说明';
        $pic_type['count'] = 4;
        $pic_type['reference'] = ["https://static.pandateacher.com/go_img.png"];

        // 文字类型
        $char_type['type'] = 'textarea';
        $char_type['title'] = '提交说明';
        $char_type['areas'][] = ['hint' => '写下你的表述写下你的表述'];
        $char_type['reference'] = '第一题的参考答案第一题的参考答案第一题的参考答案';

        $result = [$pic_type, $char_type];

        return $result;
    }

    // 设置result数据
    public function setResult()
    {
        $result = ['success' => '挑战成功' , 'fail' => '挑战失败'];

        return $result;
    }
}