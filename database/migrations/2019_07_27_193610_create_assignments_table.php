<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->enum('status', ['CURRENT', 'PAST', 'FUTURE']);

            $table->integer('employer_id')->unsigned()->index();
            $table->integer('employment_id')->unsigned()->index()->nullable();

            $table->foreign('employer_id')->references('id')->on('employers')
                ->onDelete('cascade');
            $table->foreign('employment_id')->references('id')->on('employments')
                ->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::drop('assignments');
        Schema::enableForeignKeyConstraints();
    }
}
