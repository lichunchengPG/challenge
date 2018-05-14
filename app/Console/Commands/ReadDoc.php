<?php

namespace App\Console\Commands;

use App\Http\Controllers\challenge\DataHandler;
use Illuminate\Console\Command;

class ReadDoc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'doc:transform';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'transform doc data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = $this->ask('请输入文件路径');
        $type = $this->ask('请输入挑战类型');
        $bank_name = $this->ask('请输入版本名称');
        $heading = $this->ask('请输入挑战标题');
        $plan_id = $this->ask('请输入课程ID');
        $cron = $this->choice('是否超时?(0:否 1:是)',[0, 1]);
        $sore = $this->ask('完成后最高可获得的分数');
        $change = $this->choice('是否批改?(0:否 1:是)', [0, 1]);
        $feedback = $this->choice('反馈模式？(0:关闭 1:开启)', [0, 1]);
        echo PHP_EOL;

        $createData = ['bank_name' => $bank_name, 'plan_id' => $plan_id,
            'heading' => $heading, 'cron' => $cron, 'score' => $sore,
            'change' => $change, 'feedback' => $feedback];


        $dataHandler = new DataHandler($path, $type);

        $dataHandler->writeData($createData);
    }
}
