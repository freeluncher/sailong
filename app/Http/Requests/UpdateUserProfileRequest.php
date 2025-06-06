<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $email
 * @property string|null $password
 * @property string|null $profile_photo_url
 */
class UpdateUserProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user()->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);
        // pastikan properti bisa diakses sebagai $request->name, $request->email, dst
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }
        return $data;
    }
}
