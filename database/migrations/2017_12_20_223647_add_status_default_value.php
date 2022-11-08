<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusDefaultValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('articulos', function(Blueprint $table){
            $table->boolean('status')->change()->default( true  );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //
        Schema::table('articulos', function(Blueprint $table){
            $table->boolean('status')->change()->nullable();
        });
    }
}
