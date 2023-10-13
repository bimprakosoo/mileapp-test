<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatchPackageRequest extends FormRequest
{

  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'customer_name' => 'string|max:100',
      'transaction_amount' => 'numeric|min:0',
      'transaction_state' => 'in:PAID, NOTPAID'
    ];
  }
}
