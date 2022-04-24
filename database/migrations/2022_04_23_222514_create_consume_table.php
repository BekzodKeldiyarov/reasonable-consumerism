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
        Schema::create('consume', function (Blueprint $table) {
            $table->primary(['user_id', 'good_id', 'consume_date']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('good_id')->constrained()->onDelete('cascade');
            $table->date('consume_date');
            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consume');
    }
};
