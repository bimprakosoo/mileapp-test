<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Http\Requests\StorePackageRequest;

class PackageController extends Controller
{

  public function get($id = null)
  {
    try {
      if ($id) {
        $package = Package::where('transaction_id', $id)->first();

        if (!$package) {
          return response()->json(['message' => 'Package not found'], 404);
        }

        return response()->json(['package' => $package]);
      } else {
        $package = Package::all();

        return response()->json(['packages' => $package]);
      }
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 400);
    }
  }

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
