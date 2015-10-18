<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ApplicationFormRequest extends Request
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
            'name'                  => 'required',
            'address'               => 'required',
            'phone'                 => 'required',
            'email'                 => 'required|email',
            'cashAvailable'         => 'required',
            'netWorth'              => 'required',
            'investmentTimeFrame'   => 'required',
            'desiredLocation'       => 'required'
        ];
    }
}
