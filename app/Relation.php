<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Relation.
 *
 * @author  The scaffold-interface created at 2017-03-19 11:23:36am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Relation extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'relations';

	
}
