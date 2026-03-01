<?php

namespace App\Http\Requests\Counter;

use Illuminate\Foundation\Http\FormRequest;

class CounterRequest extends FormRequest
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
            'serial_no' => 'required',
            'name_en' => 'required|max:255',
            'name_tr' => 'required|max:255',
            'parent_id' => 'nullable|exists:counters,id',
            'building_id' => 'nullable|',
            'counter_type_id' => 'required|exists:counter_types,id',
            'last_reading_value' => 'required',
            'status_id' => 'required',
            'tariff_id' => 'nullable|exists:tariffs,id',
            'ip' => 'required',
            'device_model_id' => 'nullable|exists:device_models,id',
            'is_spent' => 'nullable',
            'location_x' => 'nullable',
            'location_y' => 'nullable'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'parent_id.exists' => trans('validation.missing_parent'),
            'building_id.exists' => trans('validation.missing_building'),
            'counter_type_id.exists' => trans('validation.missing_counter_type'),
            'tariff_id.exists' => trans('validation.missing_tariff'),
            'device_model_id.exists' => trans('validation.missing_device_model'),
        ];
    }
}
