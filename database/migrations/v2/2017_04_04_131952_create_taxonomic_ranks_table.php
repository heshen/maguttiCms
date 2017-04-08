<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomicRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomic_ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->unique()->comment('分类等级名称');
            $table->string('english_name',50)->comment('英文分类等级名称');
            $table->string('latin_name', 50)->unique()->comment('拉丁分类等级名称');
            $table->integer('pid')->default(0)->comment('父Id');
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
        Schema::dropIfExists('taxonomic_ranks');
    }
}
