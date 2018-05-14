<?php
/**
 * Created by PhpStorm.
 * User: lichuncheng
 * Date: 2018/5/11
 * Time: 14:58
 */

namespace App\Http\Controllers\challenge;
use App\EsChallengeBank;


/**
 * Class DataHandler
 * @package App\Http\Controllers\challenge
 * 读取doc文档 转化格式
 */
class DataHandler
{
    public $type;

    public $typeArray = [
        '12' => 'UploadPic' // 传图片类型
    ];

    public $docPath; // 文档路径

    public $docData; // 文档内容


    /**
     * DataHandler constructor.
     * @param string $dacPath
     * @param string $type
     */
    public function __construct($dacPath='', $type = '')
    {
        // 类型
        $this->type = $this->typeArray[$type];
        // 文档路径
        $this->docPath = $dacPath;
    }


    // 根据不同的type, 生成相应的格式转化器
    protected function DataTransform()
    {
        switch ($this->type){
            case 'UploadPic':
                return new UploadPicData($this->docData);
        }
    }

    // 读取文档
    public function readDoc()
    {
        $tmp = explode('.', $this->docPath);
        $ext = $tmp[1] ?? '';
        switch ($ext){
            case 'txt':
                return new TxtReader($this->docPath);
            case 'doc':
                return new DocReader($this->docPath);
        }
    }


    // 写入数据库
    public function writeData($createData = [])
    {
        // 生成阅读器
        $reader = $this->readDoc();
        $this->docData = $reader->readFile();

        // 生成格式转化器
        $dataTransform = $this->DataTransform();

        // 获取转化的data数据
        $data = $dataTransform->getData();

        $createData['data'] = $data;

        dd($data);

        $result = EsChallengeBank::create($createData);

        return $result;
    }

}