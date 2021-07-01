<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository as Repo;
use App\Http\Requests\CustomerRequest as RequestModel; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller {

    private $repository;
    private $model = 'App\Models\Customer';
    private $name = 'customers';
    private $singular = 'Cliente';
    private $plural = 'Clientes';

     public function __construct(Repo $repository) {
        $this->repository = $repository;
        View::share('name', strtolower($this->name));
        View::share('singular', $this->singular);
        View::share('plural', $this->plural);
        View::share('token', $this->repository->getToken());
     }

     public function index() { 
        $records = $this->repository->all();
        return view($this->name . '.index', compact('records'));
     }

     public function create() {
        return view($this->name . '.create');
     }

     public function store(Request $request) {
        $token = $request->token;
        $data = $request->except(['_token', 'token']);
        $this->repository->create($data);
        session()->flash('flash.success', 'Registro creado con éxito');
        return redirect()->route($this->name . '.index', ['token' => $token]);
     }

    public function edit($id) {
        $record = $this->repository->get($id);
        return view($this->name . '.edit', compact('record'));
    }

    public function update(Request $request, $id) {
      $data = $request->except(['_token', '_method', 'token']);
      $this->repository->update($id, $data);
      session()->flash('flash.success', 'Registro actualizado con éxito');
      return redirect()->route($this->name . '.index', ['token' => $this->repository->getToken()]);
    }

    public function destroy(Request $request) {
        $token = $request->token;
        $id = $request->id;
        $this->repository->delete($id);
        session()->flash('flash.success', 'El registro se eliminó con éxito');
        return redirect()->route($this->name . '.index', ['token' => $token]);
    }

}

