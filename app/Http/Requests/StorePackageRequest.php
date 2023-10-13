<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
{
  protected $redirect;

  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'transaction_id' => 'required|string|uuid',
      'customer_name' => 'required|string',
      'customer_code' => 'required|string',
      'transaction_amount' => 'required|numeric|min:0',
      'transaction_discount' => 'required|numeric',
      'transaction_additional_field' => 'nullable|string',
      'transaction_payment_type' => 'required|string',
      'transaction_state' => 'required|in:PAID, NOT PAID',
      'transaction_code' => 'required|string',
      'transaction_order' => 'required|integer',
      'location_id' => 'required|string',
      'organization_id' => 'required|integer',
      'transaction_payment_type_name' => 'required|string',
      'transaction_cash_amount' => 'required|numeric',
      'transaction_cash_change' => 'required|numeric',
      'customer_attribute' => 'required|array',
      'customer_attribute.Nama_Sales' => 'required|string',
      'customer_attribute.TOP' => 'required|string',
      'customer_attribute.Jenis_Pelanggan' => 'required|string',
      'connote' => 'required|array',
      'connote.connote_id' => 'required|string',
      'connote.connote_number' => 'required|integer|min:1',
      'connote.connote_service' => 'required|string',
      'connote.connote_service_price' => 'required|numeric',
      'connote.connote_amount' => 'required|numeric',
      'connote.connote_code' => 'required|string',
      'connote.connote_booking_code' => 'nullable|string',
      'connote.connote_order' => 'required|integer',
      'connote.connote_state' => 'required|string',
      'connote.connote_state_id' => 'required|integer',
      'connote.zone_code_from' => 'required|string',
      'connote.zone_code_to' => 'required|string',
      'connote.surcharge_amount' => 'nullable|numeric',
      'connote.actual_weight' => 'required|numeric',
      'connote.volume_weight' => 'required|numeric',
      'connote.chargeable_weight' => 'required|numeric',
      'connote.created_at' => 'required|date',
      'connote.updated_at' => 'required|date',
      'connote.organization_id' => 'required|integer',
      'connote.location_id' => 'required|string',
      'connote.connote_total_package' => 'required|string',
      'connote.connote_surcharge_amount' => 'nullable|numeric',
      'connote.connote_sla_day' => 'required|string',
      'connote.location_name' => 'required|string',
      'connote.location_type' => 'required|string',
      'connote.source_tariff_db' => 'required|string',
      'connote.id_source_tariff' => 'required|string',
      'connote.pod' => 'nullable|string',
      'connote.history' => 'array',
      'connote_id' => 'required|string',
      'origin_data' => 'required|array',
      'origin_data.customer_name' => 'required|string',
      'origin_data.customer_address' => 'required|string',
      'origin_data.customer_email' => 'nullable|email',
      'origin_data.customer_phone' => 'required|string',
      'origin_data.customer_address_detail' => 'nullable|string',
      'origin_data.customer_zip_code' => 'required|string',
      'origin_data.zone_code' => 'required|string',
      'origin_data.organization_id' => 'required|integer',
      'origin_data.location_id' => 'required|string',
      'destination_data' => 'required|array',
      'destination_data.customer_name' => 'required|string',
      'destination_data.customer_address' => 'required|string',
      'destination_data.customer_email' => 'nullable|email',
      'destination_data.customer_phone' => 'required|string',
      'destination_data.customer_address_detail' => 'nullable|string',
      'destination_data.customer_zip_code' => 'required|string',
      'destination_data.zone_code' => 'required|string',
      'destination_data.organization_id' => 'required|integer',
      'destination_data.location_id' => 'required|string',
      'koli_data' => 'required|array',
      'koli_data.*.koli_length' => 'required|integer',
      'koli_data.*.awb_url' => 'required|url',
      'koli_data.*.koli_chargeable_weight' => 'required|numeric',
      'koli_data.*.koli_width' => 'required|numeric',
      'koli_data.*.koli_height' => 'required|numeric',
      'koli_data.*.koli_description' => 'required|string',
      'koli_data.*.koli_weight' => 'required|numeric',
      'koli_data.*.koli_id' => 'required|string',
      'koli_data.*.koli_custom_field' => 'required|array',
      'koli_data.*.koli_code' => 'required|string',
      'custom_field' => 'required|array',
      'custom_field.catatan_tambahan' => 'required|string',
      'currentLocation' => 'required|array',
      'currentLocation.name' => 'required|string',
      'currentLocation.code' => 'required|string',
      'currentLocation.type' => 'required|string',
    ];
  }
}
