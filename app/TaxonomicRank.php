<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxonomicRank extends Model
{

    public function media() {
        return $this->morphMany('App\Media', 'model');
    }

    protected $fillable = [
        'pid',
        'name',
        'english_name',
        'latin_name',
        'sort',
    ];

    protected $fieldspec = [];
    function getFieldSpec () {

        // set the specifications for this database table

        // build array of field specifications
        $this->fieldspec['id'] = [
            'type'     => 'integer',
            'minvalue' => 0,
            'pkey'     => 'y',
            'required' =>true,
            'label'    => 'id',
            'hidden'   => '1',
            'display'  => '0',
        ];

//        $this->fieldspec['id_parent'] = [
//            'type'          => 'relation',
//            'model'         => 'category',
//            'foreign_key'   => 'id',
//            'label_key'     => 'title',
//            'required'      => false,
//            'label'         => 'Category',
//            'hidden'        => '0',
//            'display'       => '1',
//        ];


        $this->fieldspec['pid'] = [
            'type'      => 'relation',
            'model'     => 'TaxonomicRank',
            'foreign_key' => 'id',
            'label_key' => 'name',
            'label'     => '父Id',
            'hidden'    => '0',
            'required'  =>  false,
            'display'   => '1',
        ];

//        $this->fieldspec['pid'] = [
//            'type'      => 'relation',
//            'model'     => 'TaxonomicRank',
//            'foreign_key' => 'id',
//            'label_key' => 'name',
//            'label'     => '父Id',
//            'hidden'    => '0',
//            'required'  =>  true,
//            'display'   => '1',
//        ];

        $this->fieldspec['name'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => true,
            'hidden'    => '0',
            'label'     => '分类等级名称',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['english_name'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => true,
            'hidden'    => '0',
            'label'     => '英文分类等级名称',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['latin_name'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => true,
            'hidden'    => '0',
            'label'     => '拉丁文名称',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['sort'] = [
            'type'      => 'integer',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '排序',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        return $this->fieldspec;
    }
}
