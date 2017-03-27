<?php
namespace App\LaraCms\Admin\Controllers;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\LaraCms\Admin\Importer\GlobalListImport;
use Input;
use Validator;

class ImportController extends Controller
{


    public function language_translation()
    {
        $path = config('laraCms.admin.path.shared') . 'TraduzioniNewWebsite.csv';
        $file = fopen($path, "r");
        $i = 0;
        echo "<pre>";
        while (!feof($file)) {
            $data = fgetcsv($file, '', ';');
            $key = $data[0];
            $ita = $data[1];
            $lang = $data[2]; //4pt 5de 6es
            if ($i > 0) {
                echo "'" . $key . "' => '" . addslashes(trim($lang)) . "',\n";

            }
            $i++;
        }
        echo "</pre>";

        fclose($file);
    }

    public function model_translation($model)
    {
        echo $path = config('laraCms.admin.path.shared') . 'pino.csv';
        $file = fopen($path, "r");
        $i = 0;

        $lingue = ['en' => 'English',
            'it' => 'Italiano',
            'ru' => 'русский',
            'es' => 'español',
            'fr' => 'français',
            'de' => 'Deutschan',
            'zh' => 'ZH-CN'];

        $modelName = getModelFromString($model);
        echo "<pre>";

        while (!feof($file)) {
            $data = fgetcsv($file, '', ',');
            $lang = $data[0];
            $iso_code = $data[2];
            $name = $data[5];

            if ($i > 0 && $lang == 'FR') {
                $article = $modelName::where('iso_code', $iso_code)->first();

                if ($article) {
                    $article->translateOrNew('fr')->name = $name;
                    $article->save();
                } else {
                    echo "<br>";

                    $article = $modelName::create(
                        [
                            'iso_code' => $iso_code,
                            'is_active' => 1,
                        ]

                    );
                    $article->translateOrNew('en')->name = $name;
                    //$article->save();
                }
            }
            $i++;
        }
        echo "</pre>";

        fclose($file);
    }


    public function csv_to_model()
    {
        $objImporter = new ContactListImport();
        $objImporter->import();
    }


    public function importone()
    {
        $objImporter = new GlobalListImport();
        $objImporter->import();
    }

}
