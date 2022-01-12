<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    protected $appends = ['body', 'option_1', 'option_2', 'option_3', 'option_4', 'option_5'];

    public function questions()
    {
        return $this->belongsTo('App\Models\Survey');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
