<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_employee' => 'required|exists:employees,id_employee',
            'leave_date' => 'required|date',
            'leave_period' => 'required|numeric',
            'reason' => 'required|max:100'
        ];
    }
}
