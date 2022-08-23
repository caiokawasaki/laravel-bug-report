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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('environment_id');
            $table->uuid()->unique();
            $table->bigInteger('pre_paid_received_messages')->default(0);
            $table->bigInteger('post_paid_received_messages')->default(0);
            $table->bigInteger('pre_paid_sent_messages')->default(0);
            $table->bigInteger('post_paid_sent_messages')->default(0);
            $table->timestamps();

            $table->foreign('environment_id')
                ->references('id')
                ->on('environments')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
