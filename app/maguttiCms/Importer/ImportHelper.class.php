<?php namespace App\LaraCms\Admin\Importer;

/**
 * Class ExportHelper
 * @package App\LaraCms\Tools
 */

use Illuminate\Support\Facades\Storage;

class ImportHelper
{

    /**
     * @var
     */
    protected $model;
    protected $resource;
    protected $skipRow = 1;

    protected $delimiter = ';';
    protected $enclosure = '"';
    protected $lineEnding = '\r\n';

    protected $disk = 'import';
    protected $back_up_dir = 'backup';
    protected $storage;


    /**
     * @return string
     */
    public function getDelimiter()
    {
        return $this->delimiter;
    }


    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
        return $this;
    }

    /**
     * @return string
     */
    public function getEnclosure()
    {
        return $this->enclosure;
    }

    /**
     * @param string $enclosure
     */
    public function setEnclosure($enclosure)
    {
        $this->enclosure = $enclosure;
    }

    /**
     * @return string
     */
    public function getLineEnding()
    {
        return $this->lineEnding;
    }

    /**
     * @param string $lineEnding
     */
    public function setLineEnding($lineEnding)
    {
        $this->lineEnding = $lineEnding;
    }

    /**
     * @param mixed $resource
     * @return ImportHelper
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param int $skipRow
     * @return ImportHelper
     */
    public function setSkipRow($skipRow)
    {
        $this->skipRow = $skipRow;
        return $this;
    }

    /**
     * @return int
     */
    public function getSkipRow()
    {
        return $this->skipRow;
    }

    function parseFile()
    {
        $path = $this->getFullPath();
        return $file = fopen($path, "r");
    }

    public function getFullPath()
    {
        return $this->getStoragePath() . $this->getResource();
    }

    /**
     * @param mixed $storage
     * @return ImportHelper
     */
    public function setStorage($disk)
    {
        $this->storage = Storage::disk($disk);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStorage()
    {
        return $this->storage;
    }

    public function getStoragePath()
    {
        return $this->storage->getDriver()->getAdapter()->getPathPrefix();
    }


    function parseResource($filename)
    {
        $i = 1;
        $stream = $this->setResource($filename)->parseFile();
        while (!feof($stream)) {
            $data = fgetcsv($stream, '', $this->getDelimiter());
            if ($i > $this->getSkipRow()) {
                $this->addData($data);

            }
            $i++;
        }
        //$this->makeBackUp($this->resource);
    }

    public function makeBackUp($oldFile)
    {
        echo $newFile = $this->getBackUpDir() . '/' . date("Ymd")."_".time(). '_' . $oldFile;
        $this->storage->move($oldFile, $newFile);
    }

    /**
     * @param string $back_up_dir
     * @return ImportHelper
     */
    public function setBackUpDir($back_up_dir)
    {
        $this->back_up_dir = $back_up_dir;
        return $this;
    }
    /**
     * @return string
     */
    public function getBackUpDir()
    {
        return $this->back_up_dir;
    }
    public function  getFileExtension($file){
        return $ext = pathinfo($file, PATHINFO_EXTENSION);
    }

    public function sanitize($data){

        return stripslashes(trim($data));
    }
}