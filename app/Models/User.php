<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    #   email - password - token - name
    protected $appends = ['points'];
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function initPoints()
    {
        $this->points = 0;
        $this->save();
    }

    public function increasePoint()
    {
        $oldPoint = $this->getPoint();
        $newPoint = $oldPoint+1;
        $this->points = $newPoint;
        $this->save();
    }
    public function decreasePoint()
    {
        $this->points -= 1;
        $this->save();
    }

    public function getPoint()
    {
        if($this->points == null)
        {
            $this->points = 0;
            $this->save();
        }
        return $this->points;
    }

    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }
    public function answers()
    {
        return $this->hasMany('App\Models\SurveyAnswer');
    }
}
