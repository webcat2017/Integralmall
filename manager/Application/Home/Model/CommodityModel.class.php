<?php
namespace Home\Model;
use Think\Model\RelationModel;
class CommodityModel extends RelationModel{
    protected $_link = array(
        'class' => array(
            'mapping_type'  => self::BELONGS_TO,
            'foreign_key'   => 'classid',
            'mapping_name'  => 'cname'
        ),

    );
}