<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lead.
 *
 * @author  The scaffold-interface created at 2017-03-19 11:24:46am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Lead extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'leads';

	
}
