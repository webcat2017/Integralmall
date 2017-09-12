<?php
namespace Home\Model;
use Think\Model\RelationModel;
class AdminModel extends RelationModel{
    protected $_link = array(
        'pow' => array(
            'mapping_type'  => self::BELONGS_TO,
            'foreign_key'   => 'status',
            'mapping_name'  => 'pow'
        ),

    );
}