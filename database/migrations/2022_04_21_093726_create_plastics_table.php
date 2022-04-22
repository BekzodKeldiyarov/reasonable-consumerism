<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plastics', function (Blueprint $table) {
//            $table->id();
            $table->foreignId('good_id')->references('id')->on('goods');
            $table->string('biodigration_time');
            $table->string('toxic_spread_emission');
            $table->string('polyethylene_density');
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
        Schema::dropIfExists('plastics');
    }
};
