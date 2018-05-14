<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EsChallengeBank extends Model
{
    public $table = 'es_challenge_bank';

    public $fillable = ['bank_name', 'plan_id', 'heading',
        'cron', 'score', 'change', 'feedback', 'data'];

}
