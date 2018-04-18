<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class user extends Model
{
    protected $table = 'user';

    public function getUsersData()
    {
    	return DB::select('select * from v_users_data');
    }

    public function saveUser($user)
    {
    	$db_user = DB::select('select * from user where id = ?',[$user["id"]]);
    	
    	empty($db_user) ? (
    		DB::insert('insert into user (name, 
    									password, 
    									role, 
    									study_group, 
    									department) 
    					values (?, ?, ?, ?, ?)', 
    									[$user["name"],
    									$user["password"],
    									$user["role"],
    									$user["group"],
    									$user["department"]]
    					)
    	) : (
    		DB::update('update user set name = ?,
    									password = ?,
    									role = ?,
    									study_group = ?,
    									department = ?
    					where id = ?', [$user["name"],
    									$user["password"],
    									$user["role"],
    									$user["group"],
    									$user["department"],
    									$user["id"]]
    					)
    	);
    }

    public function deleteUser($id)
    {
    	DB::delete('delete from user where id = ?',[$id]);
    }
}