<?php namespace App\LaraCms\Admin\Importer;

use App\Author;
use App\Category;
use App;

/**
 * Importa i dati dal fileone
 *
 * Class GlobalListImport
 * @package App\LaraCms\Admin\Importer
 */
class GlobalListImport extends ImportHelper
{

    /**
     * @var
     */
    protected $model;
    protected $lang = 'it';

    function __construct()
    {
        $this->setStorage('import');
    }

    function import()
    {
        $i = 0;
        $this->getStorage();
        foreach ($this->storage->files() as $file) {
            if ($this->getFileExtension($file) == 'csv') {
                $i++;
                echo "<h1>" . $file . "</h1>";
                $this->parseResource($file);
            };
        }
        if ($i == 0) echo "No files  found";
    }


    function addData($data)
    {

        App::setLocale('it');
        /*
        array:19 [▼
          0 => "N° FILE"
          1 => "SITO DI COLLEGAMENTO (NOME DELLA CARTELLA)"
          2 => "NOME DEL FILE CHE COMPARE SULL'APP"
          3 => "NOME DEL FILE WORD"
          4 => "FOTO DI RIFERIMENTO"
          5 => "CARATTERI DELL'OPERA IN LINGUA LOCALE (per 7 lingue)"
          6 => "NAZIONE"
          7 => "STATO"
          8 => "CONTEA/REGIONE"
          9 => "CITTA' (LOCALITA')"
          10 => "VIA"
          11 => "CIVICO"
          12 => "AMBIENTE/SALA (se in museo)"
          13 => "LATITUDINE GPS"
          14 => "LONGITUDINE GPS"
          15 => "TIPOLOGIA OPERA"
          16 => "ARTISTA (AUTORE DELL'OPERA)"
          17 => "STILE ARTISTICO"
          18 => "AUTORE DEL TESTO"
        ]
        */

        $sito  = $data[1];
        if($sito) {
            echo "<br>****************************************<br>";
            $position     =  $data[0]*10;
            echo $titolo  =  $this->sanitize($data[2]);
            echo "<br>";
            $file    =  $this->sanitize($data[3]);
            $chunk = split_nth($file,'_',5);
            $code  = $chunk[0] ;
            $style = $this->sanitize($data[17]);

            $podcast      =  "audio/".$file.'.mp3';
            $podcastData  = ['podcast' => $podcast];
            $podcastObj   = App\Podcast::firstOrNew( $podcastData);
            if(!$podcastObj->id){
                $podcastObj->title                      = $titolo ;
                $podcastObj->code                       = $code  ;
                $podcastObj->podcast                    = $podcast  ;
                $podcastObj->podcast_original_filename  = $file  ;
                $podcastObj->podcast_size               = "4852668";
                $podcastObj->podcast_last_modified      = date('Y-m-d h:i:s a', time());  ;
                $podcastObj->podcast_length             = '5.23'  ;

                $categoria    = $this->sanitize($data[15]);
                $autore       = $this->sanitize($data[16]);

                $podcastObj->category_id = $this->getCategoria($categoria);
                $podcastObj->author_id   = $this->getArtista($autore);

                $podcastObj->location_id = $this->getSito($data,$podcastObj->category_id);
                $podcastObj->image       = "";
                // cabled
                $podcastObj->writer_id    = 1;
                $podcastObj->sort        = $position;
                $podcastObj->locale      = 'it';
                $podcastObj->save();

                //*** associazione con style

            }
            if($style && $style!='==='){
                $styleArray = $this->getStyles( $style);
                if(count($styleArray ) >0 ) $podcastObj->saveStyles($styleArray);
            }
        }
        return false;
    }

    function getArtista($autore)
    {
        if($autore=='==='){
             return null;
        }
        elseif($autore!='') {
            echo "Autore:".$autore."<br>";
            $matchThese = array('title'=>$autore);
            $autoreObj = Author::updateOrCreate($matchThese,['title'=>$autore]);
            return $autoreObj->id;
        }
    }

    /**
     * @param $categoria
     */
    function getCategoria($categoria){
        if($categoria!='') {

            $categoriaObj = Category::whereTranslation('title', $categoria)->first();

            if($categoriaObj) {
                echo "Categoria: " . $categoria . " - ".$categoriaObj->id." - <br>";
                return $categoriaObj->id;
            }
            else {
                dd($categoria);
            }
        }
    }

    function getSito($data,$category_id){


        $sito          = $this->sanitize($data[1]);

        echo "Sito:".$sito."<br>";

        $locationData  = ['name' => $sito];
        $location = App\Location::firstOrNew($locationData);
        if($location->id> 0) return $location->id;
        else {

            $location->route       = ucwords(strtolower($this->sanitize($data[10])));
            $location->street_number    = ( $this->sanitize($data[11]) !='===' )?:'';
            $location->locality         = ucwords(strtolower($this->sanitize($data[9])));
            $location->administrative_area_level_1 = ucwords(strtolower($this->sanitize($data[8])));
            $location->country          = ucwords(strtolower($this->sanitize($data[7])));
            $location->name             = $sito;
            $location->category_id      = $category_id;
            $location->formatted_address   = $location->route .' '.$location->street_number.' '.$location->locality;
            $location->is_active        = 1;
            $location->city_id          = 2;
            $location->save()    ;
            return $location->id;

        }
    }


    function getStyles($style){
        $styles  = explode('/',$style);
        $arrayStili = [];
        echo "Style:".$style."<br>";
        var_dump( $styles);
        foreach ( $styles as $_style){
            $styleObj  = App\Style::whereTranslation('title', $_style)->first();
            if( $styleObj && $styleObj->id ) array_push($arrayStili,$styleObj->id);
            else dd($_style);
        }
        return $arrayStili;
    }
}