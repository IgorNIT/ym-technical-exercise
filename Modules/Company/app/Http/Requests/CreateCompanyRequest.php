<?php

namespace Modules\Company\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Company\DataTransferObjects\CompanyDTO;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255'],
            'phone'        => ['sometimes', 'numeric', 'digits_between:8,10'],
            'description'  => ['sometimes', 'string'],
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
     * @return CompanyDTO
     */
    public function toDTO(): CompanyDTO
    {
        return new CompanyDTO(
            title: $this->input('title'),
            phone: $this->input('phone'),
            description: $this->input('description'),
            author_user_id: auth()->id(),
        );
    }
}
