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
            $table->bigIncrements('id')->unsigned();
            $table->integer('type',false,true)->default(1)->index();
//            $table->bigInteger('parent_id',false,true)->nullable()->index();
            $table->boolean('status')->default(1);
            $table->text('links')->nullable();
            $table->string('primary_image')->nullable();
            $table->text('images')->nullable();
            $table->timestamps();
            $table->nestedSet();
            $table->softDeletes();

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
