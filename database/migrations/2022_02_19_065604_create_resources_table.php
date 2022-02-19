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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('status_id')->unsigned()->index();
            $table->string('link')->nullable();
            $table->bigInteger('category_id')->unsigned()->index();
            $table->longText('description');
            $table->foreign('status_id')->references('id')
                ->on('statuses')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')
                ->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
};
