<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullble();
            $table->integer('sort_order')->nullble();
            $table->integer('parent_id')->nullble();
            $table->text('meta_description')->nullble();
            $table->text('meta_keywords')->nullble();
            $table->text('meta_title')->nullble();
            $table->string('slug')->nullble();
            $table->boolean('same_page')->nullble();
            $table->longText('description')->nullble();
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
        Schema::dropIfExists('informations');
    }
}
