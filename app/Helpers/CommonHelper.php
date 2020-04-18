<?php
/**
 * File Summary
 */

namespace App\Http\Helpers;

use DB;
use Route;
use Carbon\Carbon;
/**
 * Common Helper
 */
class CommonHelper
{
    /**
     * get country list
     */
	public function getCountryList ()
	{
		return DB::table('country')->pluck('name', 'code');
	}

    /**
     * abbr role name
     *
     * @param Role $role
     */
	public function abbrRoleName ($role)
	{
		$abbr = '';

		switch (strtolower($role))
		{
			case 'admin': $abbr = 'adm'; break;
			case 'superadmin': $abbr = 'su'; break;
			default: $abbr = 'usr'; break;
		}

		return strtoupper($abbr);
	}

    /**
     * generate token
     */
	public function generateToken ()
	{
		return hash_hmac('sha256', str_random(40), config('app.key'));
	}

    /**
     * is active route
     *
     * @param Route $route
     * @param string $output
     */
	function isActiveRoute ($route, $output = "active")
	{
		if (Route::currentRouteName() == $route) return $output;
	}

    /**
     * are active routes
     *
     * @param array $routes
     * @param string $output
     */
	public static function  areActiveRoutes(Array $routes, $output = "active")
	{
		foreach ($routes as $route)
		{
			if (Route::currentRouteName() == $route) return $output;
		}
	}
	///get single field from db
	 public function getDBSingleField($table,$fieldname,$fieldvalue){
        $data = DB::table($table)->select($fieldname)->where($fieldname,$fieldvalue)->first();
     
            $envStatus  = $data->$fieldname;
             return $envStatus;
    }
	
	  function getDueInvoices(){
        $data = DB::table('invoices')->whereDate('due_date', '<', Carbon::now())->orderBy('created_at', 'asc')->get();
         return $data;
    }
}
