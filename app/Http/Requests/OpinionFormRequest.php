<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class OpinionFormRequest extends FormRequest
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
    public function rules()
    {
        return[
            'name' => 'required',
            'kana' => [
                'required',
                'regex:/^[ァ-ヶー]+$/u',
            ],
            'prefecture' => 'required',
            'municipalities' => 'required',
            'address' => 'required',
            'email' => 'required | email:strict,dns,spoof',
            'opinion' => 'required | min:20',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->sometimes('check_email', ['required', 'same:email'], function($input) {
            return !empty($input->email);
        });

        $validator->sometimes('check_email', 'required', function($input) {
            return !empty($input->email);
        });
    }

    public function messages()
	{
		return [
                'required' => ':attributeを入力してください。',
                'min' => ':attributeを:min文字以上で入力してください。',
                'email' => 'メールアドレス形式で入力してください。',
                'same' => 'メールアドレスと一致していません。',
                'min' => ':attributeは:min文字以上入力してください。',
                'regex' => ':attributeはカタカナで入力してください。',
            ];
	}

    public function attributes()
    {
        return [
            'name' => 'お名前',
            'kana' => 'フリガナ',
            'prefecture' => '都道府県',
            'municipalities' => '市区町村',
            'address' => '番地',
            'email' => 'メールアドレス',
            'check_email' => '確認用メールアドレス',
            'opinion' => 'ご意見・ご要望',
        ];
    }
}
