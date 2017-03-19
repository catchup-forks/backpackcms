<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Prospects.
 *
 * @author  The scaffold-interface created at 2017-03-19 11:26:55am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Prospects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('prospects',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('title');
        
        $table->boolean('isactive');
        
        $table->date('nextactiondate');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('lead_id')->unsigned()->nullable();
        $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
        
        $table->integer('relation_id')->unsigned()->nullable();
        $table->foreign('relation_id')->references('id')->on('relations')->onDelete('cascade');
 
        $table->timestamps();
        
        
        $table->softDeletes();
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('prospects');
    }
}
