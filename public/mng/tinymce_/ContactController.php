<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ServiceController extends Controller {

    private $model = 'App\Models\Service';
    private $name = 'services';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        View::share('name', $this->name);
    }

    public function index() {
        $records = $this->model::ordered()->get();
        return view($this->name . '.index', compact('records'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create() {
        return view($this->name . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {
        $data = $request->all();
        $object = new $this->model;
        $order = $object::max('order');
        if (empty($order)) {
            $order = 1;
        } else {
            $order++;
        }
        $data['order'] = $order;
        $object::create($data);

        session()->flash('flash.success', 'Registro creado con éxito');
        return redirect()->route($this->name . '.index');



    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id) {
        $record = $this->model::findOrFail($id);
        return view($this->name . '.edit', compact('record'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        $object = $this->model::findOrFail($id);
        if (method_exists($object, 'getFieldsFiles')) {
            $object->fill($request->except($object->getFieldsFiles()));
        } else {
            $object->fill($request->all());
        }
        $object->save();
        session()->flash('flash.success', 'Registro actualizado con éxito');
        return redirect()->route($this->name . '.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {       
        $record = $this->model::findOrFail($id);
        // dd($record->tours());
        $record->tours()->delete();
        $record->delete();
        session()->flash('flash.success', 'El registro se eliminó con éxito');
        return redirect()->route($this->name . '.index');
    }

    public function order(Request $request) {       
        if ($request->ajax()) {
            $data = $request->get('data_images');            
            $updateDefault = $request->get('order');
            $arrUpdate = array();

            foreach ($data as $key => $item) {
                $dataUp = ['order' => ($key + 1)];
                $this->model::where('id', $item)->update($dataUp);
            }
            return response()->json(['status' => 1]);

        }

    }
}

