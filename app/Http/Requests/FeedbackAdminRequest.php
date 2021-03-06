<?php

namespace App\Http\Requests;

use App\Rules\PhoneRule;
use App\Services\FeedbackService;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:70',
            'name' => 'required|max:70|min:3',
            'phone' => [
                'required',
                new PhoneRule(),
                'max:20',
                'min:7'
            ],
            'text' => 'required|max:255|min:8',
            'status' => 'required|in:' . implode(',',FeedbackService::getStatuses())
        ];
    }
}
