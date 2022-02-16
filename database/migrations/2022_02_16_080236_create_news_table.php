<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('slug');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('status_id')->unsigned()->index();
            $table->longText('content');
            $table->text('summary');
            $table->text('tags');
            $table->string('imageAlt');
            $table->string('imageTitle');
            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnDelete();
            $table->foreign('status_id')->references('id')
                ->on('statuses')->cascadeOnDelete();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
