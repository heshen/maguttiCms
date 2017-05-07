<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Botany extends Model
{
    //

    /**
     * @return mixed
     */
    public function media()
    {
        return $this->morphMany('App\Media', 'model')->orderBy('sort');
    }

    public function taxonomy() {
        return $this->belongsTo('App\Taxonomy','pid','id');
    }

    protected $fillable = [
        'name',
        'alias',
        'english_name',
        'latin_name',
        'taxon',
        'family',
        'latin_family',
        'genus',
        'latin_genus',
        'trait',
        'distribution',
        'growth_env',
        'purpose',
        'medical',
        'img_title1',
        'img_title2',
        'img_title3',
        'img_title4',
        'img_title5',
        'img_title6',
//        'created_at',
//        'updated_at'
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


        $this->fieldspec['name'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => true,
            'hidden'    => '0',
            'label'     => '植物中文名称',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['alias'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '植物别名名称',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['english_name'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '植物英文名称',
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

//        $this->fieldspec['taxon'] = [
//            'type'      => 'integer',
//            'pkey'      => 'n',
//            'required'  => true,
//            'hidden'    => '0',
//            'label'     => '生物分类',
//            'extraMsg'  => '',
//            'display'   => '1',
//        ];

        $this->fieldspec['taxon'] = [
            'type'      => 'relation',
            'model'     => 'taxonomy',
            'foreign_key' => 'id',
            'label_key' => 'name',
            'label'     => '生物分类',
            'hidden'    => '0',
            'required'  =>  true,
            'display'   => '1',
        ];

        $this->fieldspec['family'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '科',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['latin_family'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '科(拉丁)',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['genus'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '属',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['latin_genus'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '属(拉丁)',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['trait'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => true,
            'hidden'    => '0',
            'label'     => '特征',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['distribution'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '分布',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['growth_env'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '生境',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['purpose'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '用途',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['medical'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '药用价值',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['img_title1'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '图片1标题',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['img1'] = [
            'type'      =>'media',
            'required'  => false,
            'hidden'    => 0,
            'label'     => '图片1',
            'extraMsg'  => '',
            'extraMsgEnabled'=>'Code',
            'mediaType' => 'Img',
            'display'   => 1,
        ];

        $this->fieldspec['img_title2'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '图片2标题',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['img2'] = [
            'type'      =>'media',
            'required'  => false,
            'hidden'    => 0,
            'label'     => '图片2',
            'extraMsg'  => '',
            'extraMsgEnabled'=>'Code',
            'mediaType' => 'Img',
            'display'   => 1,
        ];

        $this->fieldspec['img_title3'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '图片3标题',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['img3'] = [
            'type'      =>'media',
            'required'  => false,
            'hidden'    => 0,
            'label'     => '图片3',
            'extraMsg'  => '',
            'extraMsgEnabled'=>'Code',
            'mediaType' => 'Img',
            'display'   => 1,
        ];

        $this->fieldspec['img_title4'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '图片4标题',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['img4'] = [
            'type'      =>'media',
            'required'  => false,
            'hidden'    => 0,
            'label'     => '图片4',
            'extraMsg'  => '',
            'extraMsgEnabled'=>'Code',
            'mediaType' => 'Img',
            'display'   => 1,
        ];

        $this->fieldspec['img_title5'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '图片5标题',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['img5'] = [
            'type'      =>'media',
            'required'  => false,
            'hidden'    => 0,
            'label'     => '图片5',
            'extraMsg'  => '',
            'extraMsgEnabled'=>'Code',
            'mediaType' => 'Img',
            'display'   => 1,
        ];

        $this->fieldspec['img_title6'] = [
            'type'      => 'string',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => '图片6标题',
            'extraMsg'  => '',
            'display'   => '1',
        ];

        $this->fieldspec['img6'] = [
            'type'      =>'media',
            'required'  => false,
            'hidden'    => 0,
            'label'     => '图片6',
            'extraMsg'  => '',
            'extraMsgEnabled'=>'Code',
            'mediaType' => 'Img',
            'display'   => 1,
        ];
        return $this->fieldspec;
    }

    //Latest

}
