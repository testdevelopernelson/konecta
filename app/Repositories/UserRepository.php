<?php

namespace App\Repositories;

/**
 * 
 */
use DB;
class UserRepository extends BaseRepository
{

	protected $token;
	
	public function __construct()
	{
		$this->token = request()->get('token') ? request()->get('token') : '';
		parent::__construct('users', $this->token);
	}

	public function search(){
		$query = $this->all();
    $field_form = [];
    if (!empty(request()->get('name'))) {
      $field_form['name'] = request()->get('name');
     	$results = DB::table('users')->where('name', 'LIKE', "%{$field_form['name']}%");
    } 
    $response = ['query' => $query, 'field_form' => $field_form];
    return $response; 
	}
}