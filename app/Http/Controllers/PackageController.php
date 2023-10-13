<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Http\Requests\StorePackageRequest;

class PackageController extends Controller
{
  public function store(StorePackageRequest $request)
  {
    try {
      $data = $request->validated();
      $package = new Package();
      $package->fill($data);
      $package->save();

      return response()->json(["Message" => "Package successfully saved"], 201);
    } catch (\Exception $e) {
      return response()->json(['messagse' => $e->getMessage()], 400);
    }
  }
}
