<?php

namespace App\Models;
/**
 * Created by PhpStorm.
 * User: coolm
 * Date: 12/22/2016
 * Time: 7:27 PM
 */

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $activity_id
 * @property integer $disorder_id
 * @property string $activity_name
 * @property string $activity_desc
 * @property string $activity_img
 */

class Activity extends Model{

    protected $table = "activity_suggestion";

    public $timestamp = false;

    public function disorder(){
        return $this->belongsTo('Disorders',[$this->disorder_id]);
    }
}