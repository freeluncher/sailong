<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $title
 * @property string $content
 * @property string|null $hero_image_path
 * @property array|null $cards
 */
class UpdateLandingPageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'hero_image_path' => 'nullable|string|max:255',
            'cards' => 'nullable|array',
            'cards.*.title' => 'required_with:cards|string|max:255',
            'cards.*.description' => 'required_with:cards|string',
            'cards.*.image_path' => 'required_with:cards|string|max:255',
            'cards.*.url' => 'required_with:cards|string|max:255',
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
