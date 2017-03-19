<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Leads.
 *
 * @author  The scaffold-interface created at 2017-03-19 11:24:46am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Leads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('leads',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('title');
        
        $table->boolean('isactive');
        
        $table->date('nextactiondate');
        
        /**
         * Foreignkeys section
         */
        
        
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
        Schema::drop('leads');
    }
}
