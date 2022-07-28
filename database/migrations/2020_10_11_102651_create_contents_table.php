<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subCategory_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->string('video_url')->nullable();
            $table->double('course_price', 8, 2);
            $table->float('course_discount_price', 8, 2)->nullable();
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
        Schema::dropIfExists('contents');
    }
}
