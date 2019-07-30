<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_leave', function (Blueprint $table) {
            $table->integer('assignment_id')->unsigned()->index();
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
            $table->integer('leave_id')->unsigned()->index();
            $table->foreign('leave_id')->references('id')->on('leaves')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_leave');
    }
}
