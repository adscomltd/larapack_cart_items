<?php

namespace Adscom\LarapackCartItems\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CartItemBatchStoreRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(): array
  {
    return [
      'data' => 'array',
      'data.*.id' => [
        'required',
        'integer',
        'gt:0',
      ],
      'data.*.qty' => 'required|integer|gt:0',
    ];
  }
}
