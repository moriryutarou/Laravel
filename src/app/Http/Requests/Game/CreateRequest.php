<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'game' => 'required|max:100'
        ];
    }

    public function userId(): int
    {
        return $this->user()->id;
    }

    public function game(): string
    {
        return $this->input('game');
    }
}
