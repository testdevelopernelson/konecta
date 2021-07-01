<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{  

	private $model = 'App\Models\Customer';

  public function authorize(){
      return true;
  }


  public function rules(){
      $record = $this->model::find($this->customer);
      $rules = [
          'name'=>'required', 
          'email' => 'required|email'
      ];

      if($this->method() == 'PUT'){
        $rules['slug'] = 'unique:Customern,slug,'.$record->id;
      }

      return $rules;        

    }

    public function messages(){      
        return [
          'name.required'=>'El nombre es requerido',
          'email.required'=>'El correo es requerido',
          'email.email'=>'Ingrese un correo válido',
        ];

    }



   

}

