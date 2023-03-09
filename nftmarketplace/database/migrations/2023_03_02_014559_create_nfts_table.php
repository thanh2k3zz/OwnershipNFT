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
        Schema::create('nfts', function (Blueprint $table) {
            $table->id();
            $table->string('token_name');
            $table->string('feature_image_path');
            $table->string('feature_image_name');
            $table->string('ipfs');
            $table->string('policyid');
            $table->unsignedBigInteger('user_id');
            // $table->integer('metadata_id');
            // $table->foreign('metadata_id')->references('id')->on('metadatas');
            $table->unsignedBigInteger('collection_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('collection_id')->references('id')->on('collections');

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
        Schema::dropIfExists('nfts');
    }
};
