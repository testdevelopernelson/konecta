<?php



namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class UserRequest extends FormRequest {

    /**

     * Determine if the user is authorized to make this request.

     *

     * @return bool

     */
    private $model = 'App\Models\User';
    public function authorize() {

        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array

     */

     public function rules() {
        $record = $this->model::find($this->user);
        $rules = [
            'name' => 'required'
        ];
        if($this->method() == 'POST'){
            $rules['password'] = 'required|confirmed|min:6';
            $rules['email'] = 'required|email|unique:users';
        }

        if($this->method() == 'PUT'){
            $rules['email'] = 'unique:users,email,'.$record->id;
          }
        return $rules;
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo es requerido',
            'email.email' => 'Ingrese un correo válido',
            'email.unique' => 'El correo ingresado ya existe',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'Las contraseña debe tener mínimo 6 caracteres'
        ];

    }

}

