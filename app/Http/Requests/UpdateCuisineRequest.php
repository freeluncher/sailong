<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $location
 * @property string $description
 * @property string|null $image
 * @property array|null $gallery
 * @property string $opening_hours
 * @property string $closing_hours
 * @property float $ticket_price
 */
class UpdateCuisineRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'opening_hours' => 'required|string|max:255',
            'closing_hours' => 'required|string|max:255',
            'ticket_price' => 'required|numeric',
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
