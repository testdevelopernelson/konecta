<?php

namespace App\Repositories;

/**
 * 
 */
class CustomerRepository extends BaseRepository
{
	
	protected $token;
	
	public function __construct()
	{
		$this->token = request()->get('token') ? request()->get('token') : '';
		parent::__construct('customers', $this->token);
	} 
}