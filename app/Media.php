<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    use \Dimsav\Translatable\Translatable;

    protected   $table = 'media';
    public      $translatedAttributes = ['title','description'];
    protected   $fillable = ['title','description','sort','media_category_id'];
    protected   $fieldspec = [];


    public function media()
    {
        return $this->morphTo();
    }

    public function media_category()
    {
        return $this->belongsTo('App\Domain','media_category_id','id');
    }

    function getFieldSpec ()
        // set the specifications for this database table
    {

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
        $this->fieldspec['file_name'] = [
            'type'      => 'readonly',
            'required'  => true,
            'hidden'    => 0,
            'label'     => 'File name',
            'extraMsg'  => '',
            'lang'      => 0,
            'display'   => 1,

        ];
        $this->fieldspec['media_category_id'] = [
            'type'          => 'relation',
            'model'         => 'Domain',
            'filter'        =>  ['domain' => 'imagetype'],
            'foreign_key'   => 'id',
            'label_key'     => 'title',
            'label'     => 'Media Category',
            'hidden'    => '0',
            'required'  =>  false,
            'display'   => '1',

        ];

        $this->fieldspec['title']    = [
            'type'      => 'string',
            'required'  => true,
            'hidden'    => 0,
            'label'     => 'Title',
            'extraMsg'  => '',
            'display'   => 1,
        ];

        $this->fieldspec['description'] = [
            'type'      => 'text',
            'size'      => 600,
            'h'         => 300,
            'required'  => true,
            'hidden'    => 0,
            'label'     => 'Description',
            'extraMsg'  => '',
            'cssClass'  => 'smallArea',
            'display'   => 1,
        ];
        $this->fieldspec['sort'] = [
            'type'      => 'integer',
            'required'  => false,
            'label'     => 'Order',
            'hidden'    => '0',
            'display'   => '1',
        ];

        $this->fieldspec['pub'] = [
            'type'      => 'boolean',
            'pkey'      => 'n',
            'required'  => false,
            'hidden'    => '0',
            'label'     => trans('admin.label.active'),
            'display'   => '1'
        ];

        return $this->fieldspec;
    }

    /**
     * @param $query
     * @param string $media_category_id
     */

    public function scopeGallery($query,$media_category_id='')    {
        if($media_category_id!='') $query->where('media_category_id',$media_category_id) ;
		$query->orderBy('sort', 'asc');
	}

	public function url($value='') {
		switch ($this->collection_name) {
			case 'images': return '/'.config('maguttiCms.admin.path.img_repository').$this->file_name; break;
			case 'documents': return '/'.config('maguttiCms.admin.path.doc_repository').$this->file_name; break;
		}
	}

	public function path($value='') {
		switch ($this->collection_name) {
			case 'images': return public_path().config('maguttiCms.admin.path.img_repository').$this->file_name; break;
			case 'documents': return public_path().config('maguttiCms.admin.path.doc_repository').$this->file_name; break;
		}
	}

}
