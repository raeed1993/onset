<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('project_name');
            $table->text('about_project')->nullable();
            $table->string('logo_prefer')->nullable();
            $table->string('feature_project')->nullable();
            $table->string('services_products_project')->nullable();
            $table->string('purpose_photography_video')->nullable();
            $table->integer('camera_count')->nullable();
            $table->integer('number_shooting_days')->nullable();
            $table->decimal('video_duration', 8, 3)->nullable();
            $table->boolean('aerial_photography')->nullable();
            $table->boolean('include_grafic_video')->nullable();
            $table->boolean('include_voice_comment')->nullable();
            $table->string('link_like_video')->nullable();
            $table->text('note')->nullable();
            $table->enum('type', ['photography_show', 'visual_identity']);
            $table->enum('type_logo', ['calligraphy', 'character', 'combination', 'letter', 'symbol', 'typeface'])->nullable();
            $table->enum('type_services', ['photo', 'video', 'dron', 'live', 'video_editor', 'photography_editor'])->nullable();
            $table->enum('type_project', ['company', 'activity', 'product', 'personal', 'other']);
            $table->enum('target_segment', ['childs', 'women', 'men', 'young', 'all'])->nullable();
            $table->timestamp('read_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
