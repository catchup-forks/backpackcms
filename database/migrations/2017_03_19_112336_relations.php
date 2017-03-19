<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Relations.
 *
 * @author  The scaffold-interface created at 2017-03-19 11:23:36am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('relations',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('name');
        
        $table->String('slug');
        
        $table->boolean('isactive');
        
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
        Schema::drop('relations');
    }
}
