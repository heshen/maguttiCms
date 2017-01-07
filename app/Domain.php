<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    //
    use \Dimsav\Translatable\Translatable;
    public    $translatedAttributes = ['title'];
    protected $fillable  = ['domain','title','value','pub','sort'];
    protected $fieldspec = [];


    function getFieldSpec ()
    {

        // build array of field specifications
        $this->fieldspec['id'] = [
            'type'      => 'integer',
            'minvalue'  => 0,
            'pkey'      => 'y',
            'required'  => true,
            'label'     => 'id',
            'hidden'    => '1',
            'display'   => '0',
        ];

        $this->fieldspec['domain'] = [
            'type'      => 'string',
            'required'  => true,
            'hidden'    => 0,
            'label'     => 'Domain',
            'extraMsg'  => '',
            'display'   => 1,
        ];

        $this->fieldspec['title'] = [
            'type'      => 'string',
            'required'  => true,
            'hidden'    => 0,
            'label'     => 'Title',
            'extraMsg'  => '',
            'display'   => 1,
        ];

        $this->fieldspec['value'] = [
            'type'      => 'string',
            'required'  => true,
            'hidden'    => 0,
            'label'     => 'Value',
            'extraMsg'  => '',
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

    /*****************************  REPOSITORY **********************/
    public function scopePublished($query)    {

        $query->where('pub', '=',1 );
    }

    public function scopeByDomain($query,$domain)    {

        $query->where('domain', '=',$domain )->published();
    }

}


