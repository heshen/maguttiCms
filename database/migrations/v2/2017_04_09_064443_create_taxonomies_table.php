<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(0)->comment('父Id');
            $table->integer('taxon_rank_id')->comment('分类等级');

            $table->string('name',50)->unique()->comment('分类名称');
            $table->string('english_name',50)->comment('英文分类名称');
            $table->string('latin_name', 50)->unique()->comment('拉丁分类名称');

            $table->integer('sort')->default(0)->comment('排序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxonomies');
    }
}
