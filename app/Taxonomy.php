<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 分类
 * Class Taxonomy
 * @package App
 */
class Taxonomy extends Model
{

    public function media() {
        return $this->morphMany('App\Media', 'model');
    }

    public function taxonomyrank() {
        return $this->belongsTo('App\TaxonomicRank','taxon_rank_id','id');
    }

    public function taxonomy() {
        return $this->belongsTo('App\Taxonomy','pid','id');
    }

    public function getAllTaxonomicRanks() {
        return $this->hasMany('App\TaxonomicRank');
    }

    protected $fillable = [
        'pid',
        'taxon_rank_id',
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

        $this->fieldspec['pid'] = [
            'type'      => 'relation',
            'model'     => 'Taxonomy',
            'foreign_key' => 'id',
            'label_key' => 'name',
            'label'     => '父Id',
            'hidden'    => '0',
            'required'  =>  false,
            'display'   => '1',
        ];

        $this->fieldspec['taxon_rank_id'] = [
            'type'      => 'relation',
            'model'     => 'TaxonomicRank',
            'foreign_key' => 'id',
            'label_key' => 'name',
            'label'     => '分类等级',
            'hidden'    => '0',
            'required'  =>  true,
            'display'   => '1',
        ];

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
