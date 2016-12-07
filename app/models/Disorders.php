<?php

namespace App\Models;

/**
 * Created by PhpStorm.
 * User: coolm
 * Date: 11/17/2016
 * Time: 4:32 PM
 */
use Illuminate\Database\Eloquent\Model;


/**
 * @property integer $id
 * @property string $disordername
 * @property string $disorderdesc
 */
class Disorders extends Model {

    protected $table = "disorders";

    public $timestamps = false;
}


