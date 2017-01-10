<?php namespace App\MaguttiCms\Tools;
Use Form;
Use App;
use Carbon\Carbon;
use Input;
class UploadManager {

    protected $model;

    protected $newMedia;        // file object
    protected $fileFullName;    // full filename
    protected $fileBaseName;        // filename  without extension
    protected $fileExtension;   // file extension
    protected $mediaType;       // media type  doc or image
    protected $destinationPath; // media destination path

    /**
     * @param $media
     * @param $model
     * @return $this
     */
    public function init($media) {
        $this->media = $media;
        return $this;
    }


    protected function prepareMediaToUplod() {
        if (Input::hasFile($this->media) && Input::file($this->media)->isValid()) {
            $this->newMedia        = Input::file($this->media);
            $this->setFileFullName($this->newMedia->getClientOriginalName());
            $this->fileNameHandler();
            return true;
        }
        return false;

    }
    /**
     * Store function
     * @return $this
     */
    public function store() {
        if($this->prepareMediaToUplod())$this->newMedia->move($this->getDestinationPath(),$this->getFileFullName()); // uploading file to given path;
        return  $this;
    }

    /**
     * Store any media using
     * Ajax file upload
     * @return $this
     */
    public function storeAjax() {
        if($this->prepareMediaToUplod()){
            $storage = \Storage::disk('media');
            $storage->put( $this->getMediaType() . '/' . $this->getFileFullName(), file_get_contents($this->newMedia, 'public'));
        }
        return  $this;
    }

    /**
     * Rename the file name if
     * if already exist
     * @return $this
     */
    public function fileNameHandler()
    {
        if($this->verifyIfFileExist()) {
            $newFileName = str_slug(rand(11111,99999).'_'.$this->getFileBaseName()).".".$this->getFileExtension();
            $this->setFileFullName($newFileName);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinationPath()
    {
        return $this->destinationPath = config('laraCms.admin.path.repository').$this->getMediaType();
    }

    /**
     *
     * @return bool
     */
    protected   function  verifyIfFileExist(){
        return (file_exists( public_path($this->getDestinationPath().'/'.$this->getFileFullName()))) ? true: false;
    }

    /**
     * @return mixed
     */
    protected function getFileExtension() {
        return $this->fileExtension   = $this->newMedia->getClientOriginalExtension(); // getting image extension
    }


    /**
     * @return mixed
     */
    public function getFileBaseName() {
        return $this->fileBaseName  = basename($this->newMedia->getClientOriginalName(),'.'.$this->newMedia->getClientOriginalExtension());
    }

    /**
     * @return string
     */
    public function getMediaType() {
        return $this->mediaType    = ( is_image( $this->newMedia->getMimeType()) == 'image') ? 'images':'docs';
    }

    /**
     * @return mixed
     */
    public function getFileFullName()
    {
        return $this->fileFullName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileFullName($fileName)
    {
        $this->fileFullName = $fileName;
    }


    /**
     * Store file attributes
     * @return array
     */
    public function getFileDetails()
    {

        return [
            'basename'  => $this->getFileBaseName(),
            'fullName'  => $this->getFileFullName(),
            'extension' => $this->getFileExtension(),
            'fullPath'  => $this->getDestinationPath(),
            'mimeType'  => $this->newMedia->getMimeType(),
            'mediaType' => $this->getMediaType(),
            'size'      => $this->newMedia->getClientSize(),
        ];
    }
}