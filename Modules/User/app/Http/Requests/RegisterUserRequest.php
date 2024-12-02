<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

use Modules\User\DataTransferObjects\UserDTO;
use Modules\User\Models\User;

class RegisterUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'lowercase', 'email', 'unique:'  . User::class],
            'phone'      => ['required', 'numeric', 'digits_between:8,10', 'unique:' . User::class],
            'password'   => ['required', 'string', 'confirmed', Password::defaults()]
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     *  Transform request data to DTO
     * @return UserDTO
     */
    public function toDTO(): UserDTO
    {
        return new UserDTO(
            first_name: $this->input('first_name'),
            last_name: $this->input('last_name'),
            email: $this->input('email'),
            phone: $this->input('phone'),
            password: $this->input('password')
        );
    }
}
