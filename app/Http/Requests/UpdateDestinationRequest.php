<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $description
 * @property string $location
 * @property string|null $image
 * @property float $ticket_price
 * @property array|null $gallery
 * @property string $opening_hours
 * @property string $closing_hours
 * @property array|null $action_buttons
 */
class UpdateDestinationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ticket_price' => 'required|numeric',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'opening_hours' => 'required',
            'closing_hours' => 'required',
            'action_buttons' => 'nullable|array',
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }
        return $data;
    }
}
