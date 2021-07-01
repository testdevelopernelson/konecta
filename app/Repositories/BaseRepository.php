<?php 

namespace App\Repositories;

use DB;

class BaseRepository
{

	protected $model;
	protected $token;

	public function __construct(String $model, String $token)
	{
		$this->model = $model;
		$this->token = $token;
	}

	public function all(){
		return DB::table($this->model)->get();
	}

	public function get(int $id){
		return DB::table($this->model)->find($id);
	}

	public function create($data){
    DB::table($this->model)->insert([
    	$data
    ]);
	}

	public function update(int $id, $data){
    DB::table($this->model)
    	->where('id', $id)
    	->update($data);
	}

	public function delete(int $id){
		 DB::table($this->model)
    	->where('id', $id)
    	->delete();
	}

	public function getToken(){
		return $this->token;
	}

}