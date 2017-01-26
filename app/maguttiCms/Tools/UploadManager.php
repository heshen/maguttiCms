<?php namespace App\MaguttiCms\Tools;
use Input;
Use Form;
Use App;

class UploadManager {

    protected $model;
    protected $newMedia;            // file object
    protected $fileFullName;        // full filename
    protected $fileBaseName;        // filename  without extension
    protected $fileExtension;       // file extension
    protected $mediaType;           // media type  doc or image
    protected $destinationPath;     // media destination path
    protected $disk     = 'media';  // media folder

    /**
     * @param $media
     * @param $model
     * @return $this
     */
    public function init($media,$request) {
        $this->media   = $media;
        $this->request = $request;
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
     * Store function uploading
     * file to given path;
     * @return $this
     */
    public function store() {

        if($this->prepareMediaToUplod()){
            $this->request->file($this->media)->storeAs(
                $this->getMediaType(),
                $this->getFileFullName(),
                $this->getDisk()
            );
        }
        return  $this;
    }

    /**
     * Store any media using
     * Ajax file upload
     * @return $this
     */
    /*
     * TODO
     * will be removed
     */
    public function storeAjax() {
        if($this->prepareMediaToUplod()){
            $storage = \Storage::disk($this->getDisk());
            $storage->put( $this->getMediaType() . '/' . $this->getFileFullName(),
                file_get_contents($this->newMedia,
                    'public'));
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
        return $this->destinationPath = config('maguttiCms.admin.path.repository').$this->getMediaType();
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
     * @param string $disk
     * @return UploadManager
     */
    public function setDisk($disk)
    {
        $this->disk = $disk;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisk()
    {
        return $this->disk;
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