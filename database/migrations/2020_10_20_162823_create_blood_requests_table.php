<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {

            $table->id();

            $table->foreignId('consumer_id')
                ->references('id')
                ->on('users');

            $table->foreignId('hospital_id')
                ->references('id')
                ->on('users');

            $table->string('blood_group', 3);

            $table->unsignedInteger('unit');

            $table->tinyInteger('status');
            $table->timestamp('requested_at')
                ->default(now());

            $table->timestamp('responded_at')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_requests');
    }
}
