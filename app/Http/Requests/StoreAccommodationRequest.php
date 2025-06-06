<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $description
 * @property string $location
 * @property string|null $image
 * @property float $price_per_night
 * @property array|null $gallery
 * @property string|null $opening_hours
 * @property string|null $closing_hours
 * @property array|null $action_buttons
 */
class StoreAccommodationRequest extends FormRequest
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
            'price_per_night' => 'required|numeric',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'opening_hours' => 'nullable|string|max:255',
            'closing_hours' => 'nullable|string|max:255',
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
