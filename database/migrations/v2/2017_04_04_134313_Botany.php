<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Botany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::dropIfExists('botanies');
        Schema::create('botanies', function (Blueprint $table) {
            $table->increments('id')->comment('内容id');
            $table->string('name')->comment('植物中文名称');
            $table->string('alias')->nullable()->comment('植物别名名称');
            $table->string('english_name', 50)->nullable()->comment('英文名称');
            $table->string('latin_name')->unique()->comment('拉丁文名称');
            $table->integer('taxon')->comment('生物分类');
            $table->string('family', 50)->nullable()->comment('科');
            $table->string('latin_family', 50)->nullable()->comment('拉丁科');
            $table->string('genus', 50)->nullable()->comment('属');
            $table->string('latin_genus', 50)->nullable()->comment('拉丁属');
            $table->string('trait', 3000)->comment('特征');
            $table->string('distribution', 1000)->nullable()->comment('分布');
            $table->string('growth_env', 1000)->nullable()->comment('生境');
            $table->string('purpose', 1000)->nullable()->comment('用途');
            $table->string('medical', 1000)->nullable()->comment('药用价值');

            $table->string('img_title1', 255)->nullable()->comment('图片1标题');
            $table->string('img1', 255)->nullable()->comment('图片1');
            $table->string('img_title2', 255)->nullable()->comment('图片2标题');
            $table->string('img2', 255)->nullable()->comment('图片2');
            $table->string('img_title3', 255)->nullable()->comment('图片3标题');
            $table->string('img3', 255)->nullable()->comment('图片3');
            $table->string('img_title4', 255)->nullable()->comment('图片4标题');
            $table->string('img4', 255)->nullable()->comment('图片4');
            $table->string('img_title5', 255)->nullable()->comment('图片5标题');
            $table->string('img5', 255)->nullable()->comment('图片5');
            $table->string('img_title6', 255)->nullable()->comment('图片6标题');
            $table->string('img6', 255)->nullable()->comment('图片6');

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
        //
        Schema::dropIfExists('taxonomic_ranks');
    }
}
