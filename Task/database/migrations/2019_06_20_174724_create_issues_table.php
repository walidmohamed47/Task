<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('issue');
            /*
                1 => There Are Isse
                2 => Done
            */
            $table->integer('type');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->integer('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('issues');
    }
}
