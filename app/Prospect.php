<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prospect.
 *
 * @author  The scaffold-interface created at 2017-03-19 11:26:55am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Prospect extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'prospects';

	
	public function lead()
	{
		return $this->belongsTo('App\Lead','lead_id');
	}

	
}
