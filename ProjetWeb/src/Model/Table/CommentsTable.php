<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 19/11/2018
 * Time: 11:48
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class CommentsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config); // TODO: Change the autogenerated stub
        $this->belongsTo('Picture');
    }

}