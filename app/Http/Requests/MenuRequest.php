<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'menu_name' => 'required',
            // 'route_name' => $this->uri ? 'nullable' : 'required',
            'route_name' => 'nullable',
            'icon' => 'required',
            'parent_menu_id' => 'nullable|numeric',
            'permission' => 'nullable',
            'is_active_if_url_includes' => 'nullable',
            'is_blank' => 'required',
            // 'uri' => $this->route_name ? 'nullable' : 'required',
            'uri' => 'nullable',
            'menu_group_id' => 'required|numeric',
        ];
    }
}
