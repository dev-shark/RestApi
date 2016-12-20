<?php

namespace App\Models;
/**
 * Created by PhpStorm.
 * User: coolm
 * Date: 12/20/2016
 * Time: 5:24 PM
 */
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $disordername
 * @property string $link_1
 * @property string $link_2
 * @property string $link_3
 */

class Suggestion extends Model {

    protected $table = "professional_suggestion";

    public $timestamps = false;
}