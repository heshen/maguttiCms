<?php
return [
    /**
     * Generic values are filled when when neither package was able to guess out the value.
     *
     * @var array
     */
    'item_per_pages' => 25,
    'section' => [
        'taxonomies' => [

            'model' => 'Taxonomy',
            'title' => '分类',
            'icon' => 'newspaper-o',
            'fieldLabel' => 'ID,父Id,父分类,分类等级Id,分类等级,分类名称,英文分类名称,拉丁分类名称,排序,创建时间,更新时间',

            'field' => ['id',
                'pid'   => ['type' => 'text', 'field' => 'pid', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'taxonomy'   => ['type' => 'relation','relation' => 'taxonomy', 'field' => 'name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                //taxonomyrank
                'taxon_rank_id'   => ['type' => 'text', 'field' => 'taxon_rank_id', 'class' => 'col-sm-1 text-center','orderable'=>true],
                // 'category' => ['type' => 'relation', 'relation' => 'category', 'field' => 'title', 'class' => 'col-sm-1'],
                'taxonomyrank'   => ['type' => 'relation', 'relation' => 'taxonomyrank', 'field' => 'name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'name'   => ['type' => 'text', 'field' => 'name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'english_name'   => ['type' => 'text', 'field' => 'english_name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'latin_name'   => ['type' => 'text', 'field' => 'latin_name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'sort'   => ['type' => 'text', 'field' => 'sort', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center','orderable'=>true],
            ],
            'field_searcheable' => [
                /*
                 * This is the 'relation' version which builds a dropdown input for the corresponding relation.
                 * It should be only used when there are only a few records to show.
                 */
                /**
                 * This is the 'suggest' version which builds a dropdown handled by select 2 for the corresponding relation.
                 * It should be used when there are a lot of records to filter.
                 */
                /*'id_parent' => [
                    'label'       => 'Parent page',
                    'class'       => ' col-xs-6 col-sm-2',
                    'type'        => 'suggest',
                    'model'       => 'article',
                    'value'       => 'id',
                    'caption'     => 'title',
                    'is_accessor' => '0',
                    'where'       => 'id_parent = 0',
                ],*/
                'name'   => ['type' => 'text', 'label' => '分类等级名称', 'field' => 'name', 'class' => ' col-xs-6 col-sm-2'],
                'latin_name'    => ['type' => 'text', 'label' => '分类等级名称(拉丁)', 'field' => 'latin_name', 'class' => ' col-xs-6 col-sm-1'],
            ],


            'field_exportable' => [
                'id'     => ['type' => 'integer', 'field' => 'id', 'label' => 'id'],
                //'taxon' => ['type' => 'relation', 'relation' => 'parentPage', 'field' => 'title', 'label' => 'parent'],
                'name'  =>   ['type' => 'text', 'label' =>'分类等级名称' ,'field' => 'name' ],
                'latin_name'   =>   ['type' => 'text', 'label' =>'分类等级名称(拉丁)' ,'field' => 'latin_name'],
            ],
            'orderBy' => 'id',
            'orderType' => 'DESC',
            'edit' => '1',
            'export_csv' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '1',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '1',
            'showMediaCategory' => '0',
            'showMediaImages' => '1',
            'showMediaDoc' => '1',
            'showSeo' => '1',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add','website']
                ],
            ],
        ],

        'taxonomicranks' => [

            'model' => 'TaxonomicRank',
            'title' => '分类等级',
            'icon' => 'newspaper-o',
            'fieldLabel' => 'ID,父Id,分类等级名称,英文分类等级名称,拉丁分类等级名称,排序,创建时间,更新时间',

            'field' => ['id',
                'pid'   => ['type' => 'text', 'field' => 'pid', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'name'   => ['type' => 'text', 'field' => 'name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'english_name'   => ['type' => 'text', 'field' => 'english_name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'latin_name'   => ['type' => 'text', 'field' => 'latin_name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'sort'   => ['type' => 'text', 'field' => 'sort', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center','orderable'=>true],
            ],
            'field_searcheable' => [
                /*
                 * This is the 'relation' version which builds a dropdown input for the corresponding relation.
                 * It should be only used when there are only a few records to show.
                 */
                /**
                 * This is the 'suggest' version which builds a dropdown handled by select 2 for the corresponding relation.
                 * It should be used when there are a lot of records to filter.
                 */
                /*'id_parent' => [
                    'label'       => 'Parent page',
                    'class'       => ' col-xs-6 col-sm-2',
                    'type'        => 'suggest',
                    'model'       => 'article',
                    'value'       => 'id',
                    'caption'     => 'title',
                    'is_accessor' => '0',
                    'where'       => 'id_parent = 0',
                ],*/
                'name'   => ['type' => 'text', 'label' => '分类等级名称', 'field' => 'name', 'class' => ' col-xs-6 col-sm-2'],
                'latin_name'    => ['type' => 'text', 'label' => '分类等级名称(拉丁)', 'field' => 'latin_name', 'class' => ' col-xs-6 col-sm-1'],
            ],


            'field_exportable' => [
                'id'     => ['type' => 'integer', 'field' => 'id', 'label' => 'id'],
                //'taxon' => ['type' => 'relation', 'relation' => 'parentPage', 'field' => 'title', 'label' => 'parent'],
                'name'  =>   ['type' => 'text', 'label' =>'分类等级名称' ,'field' => 'name' ],
                'latin_name'   =>   ['type' => 'text', 'label' =>'分类等级名称(拉丁)' ,'field' => 'latin_name'],
            ],
            'orderBy' => 'id',
            'orderType' => 'DESC',
            'edit' => '1',
            'export_csv' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '1',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '1',
            'showMediaCategory' => '0',
            'showMediaImages' => '1',
            'showMediaDoc' => '1',
            'showSeo' => '1',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add','website']
                ],
            ],
        ],

        'botanies' => [
            'model' => 'Botany',
            'title' => '植物',
            'icon' => 'newspaper-o',
            'fieldLabel' => 'ID,植物中文名称,植物别名名称,英文名称,拉丁文名称,生物分类,科,科(拉丁),属,属(拉丁),特征,分布,生境,用途,药用价值,图片1标题,图片1,图片2标题,图片2,图片3标题,图片3,图片4标题,图片4,图片5标题,图片5,图片6标题,图片6,创建时间,更新时间',

            'field' => ['id',
                'name'   => ['type' => 'text', 'field' => 'name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'alias'   => ['type' => 'text', 'field' => 'alias', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'english_name'   => ['type' => 'text', 'field' => 'english_name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'latin_name'   => ['type' => 'text', 'field' => 'latin_name', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'taxon'   => ['type' => 'text', 'field' => 'taxon', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'family'   => ['type' => 'text', 'field' => 'family', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'latin_family'   => ['type' => 'text', 'field' => 'latin_family', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'genus'   => ['type' => 'text', 'field' => 'genus', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'latin_genus'   => ['type' => 'text', 'field' => 'latin_genus', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'trait'   => ['type' => 'text', 'field' => 'trait', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'distribution'   => ['type' => 'text', 'field' => 'distribution', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'growth_env'   => ['type' => 'text', 'field' => 'growth_env', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'purpose'   => ['type' => 'text', 'field' => 'purpose', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'medical'   => ['type' => 'text', 'field' => 'medical', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'img_title1'  => ['type' => 'textn', 'field' => 'img_title1', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'img1'  => ['type' => 'image', 'field' => 'img1', 'class' => 'col-sm-1 list-image'],
                'img_title2'  => ['type' => 'textn', 'field' => 'img_title2', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'img2'  => ['type' => 'image', 'field' => 'img2', 'class' => 'col-sm-1 list-image'],
                'img_title3'  => ['type' => 'textn', 'field' => 'img_title3', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'img3'  => ['type' => 'image', 'field' => 'img3', 'class' => 'col-sm-1 list-image'],
                'img_title4'  => ['type' => 'textn', 'field' => 'img_title4', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'img4'  => ['type' => 'image', 'field' => 'img4', 'class' => 'col-sm-1 list-image'],
                'img_title5'  => ['type' => 'textn', 'field' => 'img_title5', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'img5'  => ['type' => 'image', 'field' => 'img5', 'class' => 'col-sm-1 list-image'],
                'img_title6'  => ['type' => 'textn', 'field' => 'img_title6', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'img6'  => ['type' => 'image', 'field' => 'img6', 'class' => 'col-sm-1 list-image'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center','orderable'=>true],
            ],
            'field_searcheable' => [
                /*
                 * This is the 'relation' version which builds a dropdown input for the corresponding relation.
                 * It should be only used when there are only a few records to show.
                 */
//                'taxon' => [
//                    'label'    => '生物分类',
//                    'class'    => ' col-xs-6 col-sm-2',
//                    'type'     => 'relation',
//                    'model'    => 'article',
//                    'relation' => 'parentPage',
//                    'value'    => 'id',
//                    'field'    => 'title',
//                    'where'    => 'id_parent = 0'
//                ],
                /**
                 * This is the 'suggest' version which builds a dropdown handled by select 2 for the corresponding relation.
                 * It should be used when there are a lot of records to filter.
                 */
                /*'id_parent' => [
                    'label'       => 'Parent page',
                    'class'       => ' col-xs-6 col-sm-2',
                    'type'        => 'suggest',
                    'model'       => 'article',
                    'value'       => 'id',
                    'caption'     => 'title',
                    'is_accessor' => '0',
                    'where'       => 'id_parent = 0',
                ],*/
                'name'   => ['type' => 'text', 'label' => '植物名称', 'field' => 'name', 'class' => ' col-xs-6 col-sm-2'],
                'latin_name'    => ['type' => 'text', 'label' => '植物（拉丁文）名称', 'field' => 'latin_name', 'class' => ' col-xs-6 col-sm-1'],
            ],


            'field_exportable' => [
                'id'     => ['type' => 'integer', 'field' => 'id', 'label' => 'id'],
                //'taxon' => ['type' => 'relation', 'relation' => 'parentPage', 'field' => 'title', 'label' => 'parent'],
                'name'  =>   ['type' => 'text', 'label' =>'植物名称' ,'field' => 'name' ],
                'latin_name'   =>   ['type' => 'text', 'label' =>'植物（拉丁文）名称' ,'field' => 'latin_name'],
            ],
            'orderBy' => 'id',
            'orderType' => 'DESC',
            'edit' => '1',
            'export_csv' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '1',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '1',
            'showMediaCategory' => '0',
            'showMediaImages' => '1',
            'showMediaDoc' => '1',
            'showSeo' => '1',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add','website']
                ],
            ],
        ],

        'articles' => [
            'model' => 'Article',
            'title' => 'Pages',
            'icon' => 'newspaper-o',
            'fieldLabel' => 'ID,Parent,Image,Title,Slug,Pub,Show Top menu,Sort,Created At,Updated At',
            'field' => ['id',
                'parent' => ['type' => 'relation', 'relation' => 'parentPage', 'field' => 'title', 'class' => 'col-sm-1'],
                'image'  => ['type' => 'image', 'field' => 'image', 'class' => 'col-sm-1 list-image'],
                'title'  => ['type' => 'textn', 'field' => 'title', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'slug'   => ['type' => 'text', 'field' => 'slug', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'top_menu' => ['type' => 'boolean', 'field' => 'top_menu', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'class' => 'col-sm-1','orderable'=>true],

                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center','orderable'=>true],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center','orderable'=>true],
            ],
            'field_searcheable' => [
                /*
                 * This is the 'relation' version which builds a dropdown input for the corresponding relation.
                 * It should be only used when there are only a few records to show.
                 */
                'id_parent' => [
                    'label'    => 'Parent page',
                    'class'    => ' col-xs-6 col-sm-2',
                    'type'     => 'relation',
                    'model'    => 'article',
                    'relation' => 'parentPage',
                    'value'    => 'id',
                    'field'    => 'title',
                    'where'    => 'id_parent = 0'
                ],
                /**
                 * This is the 'suggest' version which builds a dropdown handled by select 2 for the corresponding relation.
                 * It should be used when there are a lot of records to filter.
                 */
                /*'id_parent' => [
                    'label'       => 'Parent page',
                    'class'       => ' col-xs-6 col-sm-2',
                    'type'        => 'suggest',
                    'model'       => 'article',
                    'value'       => 'id',
                    'caption'     => 'title',
                    'is_accessor' => '0',
                    'where'       => 'id_parent = 0',
                ],*/
                'title'   => ['type' => 'text', 'label' => 'Title', 'field' => 'title', 'class' => ' col-xs-6 col-sm-2'],
                'slug'    => ['type' => 'text', 'label' => 'Slug', 'field' => 'slug', 'class' => ' col-xs-6 col-sm-1'],
                'sort'    => ['type' => 'text', 'label' => 'Sort', 'field' => 'sort', 'class' => ' col-xs-6 col-sm-1'],
            ],


            'field_exportable' => [
                'id'     => ['type' => 'integer', 'field' => 'id', 'label' => 'id'],
                'parent' => ['type' => 'relation', 'relation' => 'parentPage', 'field' => 'title', 'label' => 'parent'],
                'title'  =>   ['type' => 'text', 'label' =>'Title' ,'field' => 'title' ],
                'slug'   =>   ['type' => 'text', 'label' =>'Slug' ,'field' => 'slug'],
                'sort'   =>   ['type' => 'text', 'label' =>'Sort' ,'field' => 'sort'],
            ],
            'orderBy' => 'sort',
            'orderType' => 'ASC',
            'edit' => '1',
            'export_csv' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '1',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '1',
            'showMediaCategory' => '0',
            'showMediaImages' => '1',
            'showMediaDoc' => '1',
            'showSeo' => '1',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add','website']
                ],
            ],
        ],

        'hpsliders' => [
            'model' => 'HpSlider',
            'title' => 'Home Sliders',
            'icon' => 'image',
            'fieldLabel' => 'ID,Image,Title,Pub,Sort,Created At,Updated At',
            'field' => ['id',
                'image' => ['type' => 'image', 'field' => 'image', 'class' => 'col-sm-1 list-image'],
                'title',
                'is_active' => ['type' => 'boolean', 'field' => 'is_active', 'class' => 'col-sm-1 text-center'],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'class' => 'col-sm-1'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'edit' => '1',
            'orderBy' => 'sort',
            'orderType' => 'ASC',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add']
                ],
            ],
        ],

        'media' => [
            'model' => 'Media',
            'title' => 'Media',
            'icon' => 'files-o',
            'fieldLabel' => 'ID,Media,Title,Pub,Sort,Created At,Updated At',
            'field' => ['id',
                'image' => ['type' => 'media', 'field' => 'file_name', 'class' => 'col-sm-1 list-image'],
                'title',
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'class' => 'col-sm-1'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1'],
            ],
            'edit' => '1',
            'orderBy' => 'sort',
            'orderType' => 'ASC',
            'delete' => '1',
            'create' => '0',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'menu' => [
                'home' => false,
                'top-bar' =>[
                    'show' => false,
                    'action' =>['add']
                ],
            ],
        ],
        'news' => [
            'model' => 'News',
            'title' => 'News',
            'icon' => 'bullhorn',
            'fieldLabel' => 'ID,Date,Image,Title,Slug,Pub,Sort,Created At,Updated At',
            'field' => ['id',
                'date',
                'image' => ['type' => 'image', 'field' => 'image', 'class' => 'col-sm-1 list-image'],
                'title',
                'slug',
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'class' => 'col-sm-1'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'export_csv' => '1',
            'field_exportable' => [
                'id'     => ['type'   => 'integer', 'field' => 'id', 'label' => 'id'],
                'date'   => ['type'   => 'text',  'field' => 'date', 'label' => 'date'],
                'title'  =>   ['type' => 'text', 'label' =>'Title' ,'field' => 'title' ],
                'slug'   =>   ['type' => 'text', 'label' =>'Slug' ,'field' => 'slug'],
                'sort'   =>   ['type' => 'text', 'label' =>'Sort' ,'field' => 'sort'],
                'created_at' => ['type' => 'datetime', 'label' => 'created_at', 'field' => 'created_at'],
            ],
            'orderBy' => 'date',
            'orderType' => 'desc',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '1',
            'view' => '0',
            'selectable' => '1',
            'showMedia'         => '1',
            'showMediaCategory' => '0',
            'showMediaImages'   => '1',
            'showMediaDoc'      => '0',
            'showSeo' => '1',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add']
                ],
            ],
        ],
        'newsletters' => [
            'model' => 'Newsletter',
            'title' => 'Newsletter',
            'icon' => 'envelope',
            'fieldLabel' => 'ID,Email,Active,Created At',
            'field' => ['id',
                'email',
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
            ],
            'orderBy' => 'created_at',
            'orderType' => 'DESC',
            'edit' => '0',
            'delete' => '1',
            'create' => '0',
            'copy' => '0',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '0',
            'showSeo' => '0',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                ],
            ],
        ],
        'tags' => [
            'model' => 'Tag',
            'title' => 'TagsNews',
            'icon'  => 'tag',
            'fieldLabel' => 'ID,Title,Slug,Created At,Updated At',
            'field' => ['id',
                'title',
                'slug',
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1'],
            ],
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'menu' => [
                'home' => false,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add']
                ],
            ],
        ],

        'products' => [
            'model' => 'Product',
            'title' => 'Product',
            'icon' => 'gears',
            'fieldLabel' => 'ID,Category,Image,Title,Pub,Sort,Created At,Updated At',
            'field' => ['id',
                'category' => ['type' => 'relation', 'relation' => 'category', 'field' => 'title', 'class' => 'col-sm-1'],
                'image' => ['type' => 'image', 'field' => 'image', 'class' => 'col-sm-1 list-image'],
                'title',
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'class' => 'col-sm-1'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'orderBy' => 'sort',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '1',
            'showMediaCategory' => '0',
			'showMediaImages' => '1',
            'showMediaDoc' => '1',
            'showSeo' => '1',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add'],
                    'submodel'  =>[
                        'category' => ['label' =>'Product Categories','model' =>'category','add'=>'1' ],
                        'models'   => ['label' =>'Models','model' =>'productmodel','add'=>'1' ]
                    ]
                ],
            ],
        ],

        'categories' => [
            'model' => 'Category',
            'title' => 'Product Categories',
            'icon' => 'folder',
            'fieldLabel' => 'ID,Image,Title,Slug,Pub,Sort,Created At,Updated At',
            'field' => ['id',
                //'parent' => ['type' => 'relation', 'relation' => 'parentCategory', 'field' => 'title', 'class' => 'col-sm-1'],
                'image' => ['type' => 'image', 'field' => 'image', 'class' => 'col-sm-1 list-image'],
                'title',
                'slug',
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'class' => 'col-sm-1'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'orderBy' => 'sort',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '1',
            'showMediaCategory' => '0',
            'showMediaImages' => '1',
            'showMediaDoc' => '1',
            'showSeo' => '1',
            'menu' => [
                'home' => false,
                'top-bar' =>[
                    'show' => false,
                    'action' =>['add']
                ],
            ],
        ],

        'productmodels' => [
            'model' => 'ProductModel',
            'title' => 'Models',
            'icon' => 'folder',
            'fieldLabel' => 'ID,Image,Product,Model,Pub,Sort,Edit,Updated At',
            'field' => ['id',
                'image'   => ['type' => 'image', 'field' => 'image', 'class' => 'col-sm-1 list-image'],
                'product' => ['type' => 'relation', 'field' => 'title',  'relation' => 'product','class' => 'col-sm-3'],
                'title',
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'class' => 'col-sm-1'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'orderBy' => 'product_id',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '0',
            'showSeo' => '0',
            'menu' => [
                'home' => false,
                'top-bar' =>[
                    'show' => false,
                    'action' =>['add']
                ],
            ],
        ],

        'domains' => [
            'model' => 'Domain',
            'title' => 'Finishing Type',
            'icon' => 'folder',
            'fieldLabel' => 'ID,Domain,Title,Value,Pub,Sort,Updated At',
            'field' => ['id',
                'domain',
                'title',
                'value' => ['type' => 'editable', 'field' => 'value', 'class' => 'col-sm-1'],
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'class' => 'col-sm-1'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'orderBy' => 'domain',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '0',
            'showSeo' => '0',
            'menu' => [
                'home' => false,
                'top-bar' =>[
                    'show' => false,
                    'action' =>['add']
                ],
            ],
        ],

        'settings' => [
            'model' => 'Setting',
            'title' => 'Setting',
            'icon' => 'wrench',
            'fieldLabel' => 'ID,Domain,Key,Value,Description,Updated At',
            'field' => ['id',
                'domain',
                'key',
                'value' => ['type' => 'editable', 'field' => 'value', 'class' => 'col-sm-3'],
                'description' => ['type' => 'editable', 'field' => 'description', 'class' => 'col-sm-3'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'orderBy' => 'key',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '0',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '0',
            'showSeo' => '0',
            'menu' => [
                'home' => false,
                'top-bar' =>[
                    'show' => false,
                    'action' =>['add']
                ],
            ],
        ],
        'attributes' => [
            'model' => 'Attribute',
            'title' => 'Features',
            'icon' => 'folder',
            'fieldLabel' => 'ID,Image,Code,Title,Pub,Sort,Created At,Updated At',
            'field' => ['id',
                'image' => ['type' => 'image', 'field' => 'image', 'class' => 'col-sm-1 list-image'],
                'code',
                'title',

                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'class' => 'col-sm-1'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'orderBy' => 'title',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'showMedia' => '1',
            'showMediaDoc' => '1',
            'showSeo' => '0',
            'menu' => [
                'home' => false,
                'top-bar' =>[
                    'show' => false,
                    'action' =>['add']
                ],
            ],
        ],
        'contacts' => [
            'model' => 'Contact',
            'icon'  => 'envelope',
            'title' => 'Info Request',
            'fieldLabel' => 'ID,Email,Name,Surname,Company,Message,Requested Product,Read,Created At,Updated At',
            'field' => [
            	'id',
                'email'      => ['type' => 'text', 'field' => 'email', 'class' => 'col-sm-2 text-center'],
                'name'       => ['type' => 'text', 'field' => 'name', 'class' => 'col-sm-2 text-center'],
                'surname'    => ['type' => 'text', 'field' => 'name', 'class' => 'col-sm-2 text-center'],
                'company'    => ['type' => 'text', 'field' => 'company', 'class' => 'col-sm-2 text-center'],
                'message'    => ['type' => 'text', 'field' => 'message', 'class' => 'col-sm-2 text-center'],
                'request_product_id' => ['type' => 'relation', 'relation' => 'product', 'field' => 'title', 'class' => 'col-sm-2 text-center'],
                'status'     => ['type' => 'boolean', 'field' => 'status', 'class' => 'col-sm-1 text-center'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'orderBy' => 'id',
            'orderType' => 'DESC',
            'edit' => '0',
            'delete' => '0',
            'create' => '0',
            'copy' => '0',
            'preview' => '0',
            'view' => '0',
            'selectable' => '0',
            'password' => 0,
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true
                ],
            ]
        ],
        'roles' => [
            'model' => 'Role',
            'icon' => 'graduation-cap',
            'title' => 'Roles',
            'fieldLabel' => 'ID,Name,DisplayName, Description,Created At,Updated At',
            'field' => ['id',
                'name' => ['type' => 'editable', 'field' => 'name', 'class' => 'col-sm-2'],
                'display_name' => ['type' => 'editable', 'field' => 'display_name', 'class' => 'col-sm-2'],
                'description' => ['type' => 'text', 'field' => 'description', 'class' => 'col-sm-2'],

                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1'],
            ],
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1'
        ],
        'socials' => [
            'model' => 'Social',
            'icon' => 'users',
            'title' => 'Social',
            'fieldLabel' => 'ID,Social,Icon,Link,Active,Created At,Updated At',
            'field' => ['id',
                'title' => ['type' => 'editable', 'field' => 'title', 'class' => 'col-sm-2'],
                'icon'  => ['type' => 'editable', 'field' => 'icon', 'class' => 'col-sm-2'],
                'link'  => ['type' => 'editable', 'field' => 'link', 'class' => 'col-sm-2'],
                'is_active' => ['type' => 'boolean', 'field' => 'is_active', 'class' => 'col-sm-1 text-center'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1'],
            ],
            'orderBy' => 'sort',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'menu' => [
                'home' => true,
            ],
        ],
        'users' => [
            'model' => 'User',
            'icon' => 'users',
            'title' => 'Users',
            'fieldLabel' => 'ID,Email,Name,Password,Active,Created At,Updated At',
            'field' => ['id',
                'email' => ['type' => 'editable', 'field' => 'email', 'class' => 'col-sm-2'],
                'name' => ['type' => 'editable', 'field' => 'name', 'class' => 'col-sm-2'],
                'real_password' => ['type' => 'text', 'field' => 'real_password', 'class' => 'col-sm-2'],
                'is_active' => ['type' => 'boolean', 'field' => 'is_active', 'class' => 'col-sm-1 text-center'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1'],
            ],
            'orderBy' => 'name',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'password' => 1,
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add']
                ],
            ],
            'roles' =>[
                'su',
                'admin',
            ]
        ],
        'adminusers' => [
            'model' => 'AdminUser',
            'icon' => 'users',
            'title' => 'Admin',
            'fieldLabel' => 'ID,Email,First Name,Last,Password,Active,Created At,Updated At',
            'field' => ['id',
                'email' => ['type' => 'editable', 'field' => 'email', 'class' => 'col-sm-2'],
                'first_name' => ['type' => 'editable', 'field' => 'first_name', 'class' => 'col-sm-2'],
                'last_name' => ['type' => 'editable', 'field' => 'last_name', 'class' => 'col-sm-2'],
                'real_password' => ['type' => 'text', 'field' => 'real_password', 'class' => 'col-sm-2'],
                'is_active' => ['type' => 'boolean', 'field' => 'is_active', 'class' => 'col-sm-1 text-center'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1'],
            ],
            'orderBy' => 'first_name',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'password' => 1,
            'menu' => [
                'tool' =>[
                    'show' => true,
                    'action' =>['add']
                ],
            ],
            'roles' =>[
                'su',
                'admin',
            ]
        ],

        /************************  LOCALIZATION **********************/
        'countries' => [
            'model' => 'Country',
            'title' => 'Country',
            'icon' => 'folder',
            'fieldLabel' => 'ID,Country,ISO CODE,VAT%,Eu,Pub,Updated At',
            'field' => ['id',
                'name' => ['type' => 'editable', 'field' => 'name', 'class' => 'col-sm-1'],
                'iso_code' => ['type' => 'editable', 'field' => 'iso_code', 'class' => 'col-sm-1'],
                'vat' => ['type' => 'editable', 'field' => 'vat', 'class' => 'col-sm-1'],
                'eu' => ['type' => 'boolean', 'field' => 'eu', 'class' => 'col-sm-1 text-center'],
                'is_active' => ['type' => 'boolean', 'field' => 'is_active', 'class' => 'col-sm-1 text-center'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1 text-center'],
            ],
            'orderBy' => 'name',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '0',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '1',
            /* GF_ma  custom  view
            'editTemplate' =>'admin.special.edit_audit',
            'viewTemplate' =>'admin.special.view_audit',
            */
            'selectable' => '1',
            'showMedia' => '0',
            'showSeo' => '0',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => false,
                    'action' =>['add']
                ],
            ],
            'roles' =>[
                'su',
            ]
        ],

        'provinces' => [
            'model' => 'Province',
            'icon' => 'flag',
            'title' => 'Province',
            'fieldLabel' => 'ID,State/Regione,Code,Name,Pub,Created At,Updated At',
            'field' => ['id',
                'state' => ['type' => 'relation', 'field' => 'title',  'relation' => 'state','class' => 'col-sm-3'],
                'code' => ['type' => 'editable', 'field' => 'code', 'class' => 'col-sm-2'],
                'title' => ['type' => 'editable', 'field' => 'title', 'class' => 'col-sm-2'],
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1'],
            ],
            'orderBy' => 'title',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => false,
                    'action' =>['add']
                ],
            ],
            'roles' =>[
                'su',
            ]
        ],
        'states' => [
            'model' => 'State',
            'icon' => 'flag',
            'title' => 'State',
            'fieldLabel' => 'ID,Country,Name,Pub,Created At,Updated At',
            'field' => ['id',
                'country' => ['type' => 'relation', 'field' => 'name', 'relation' => 'country','class' => 'col-sm-3'],
                'title'   => ['type' => 'editable', 'field' => 'title', 'class' => 'col-sm-2'],
                'pub' => ['type' => 'boolean', 'field' => 'pub', 'class' => 'col-sm-1 text-center'],
                'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' => 'col-sm-1'],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'class' => 'col-sm-1'],
            ],
            'orderBy' => 'title',
            'orderType' => 'ASC',
            'edit' => '1',
            'delete' => '1',
            'create' => '1',
            'copy' => '1',
            'preview' => '0',
            'view' => '0',
            'selectable' => '1',
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => false,
                    'action' =>['add']
                ],
            ],
            'roles' =>[
                'su',
                'admin',
            ]
        ],
    ],
];
