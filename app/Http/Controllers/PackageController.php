<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatchPackageRequest;
use App\Http\Requests\StorePackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

  public function index()
  {
    $package = Package::all();

    return response()->json(['packages' => $package], 200);
  }

  public function store(StorePackageRequest $request)
  {
    $data = $request->validated();
    $package = new Package();
    $package->fill($data);
    $package->save();

    return response()->json(["Message" => "Package successfully saved"], 201);
  }

  public function show(string $id)
  {
    $package = Package::where('transaction_id', $id)->first();
    if (!$package) {
      return response()->json(['message' => 'Package not found'], 404);
    }

    return response()->json(['package' => $package], 200);
  }

  public function putUpdate(StorePackageRequest $request, string $id)
  {
    $data = $request->validated();
    $package = Package::where('transaction_id', $id)->first();
    if (!$package) {
      $data['transaction_id'] = $id;
      Package::create($data);
      return response()->json(['message' => 'Package created successfully since no package found'], 201);
    }

    $package->update($data);
    return response()->json(['message' => 'Package updated successfully'], 200);
  }

  public function patchUpdate(PatchPackageRequest $request, string $id)
  {
    $data = $request->validated();
    $package = Package::where('transaction_id', $id)->first();
    if (!$package) {
      return response()->json(['message' => 'Package not found'], 404);
    }

    $package->update($data);
    return response()->json(['message' => 'Package updated successfully'], 200);
  }

  public function destroy(string $id)
  {
    $package = Package::where('transaction_id', $id)->first();
    if (!$package) {
      return response()->json(['message' => 'Package not found'], 404);
    }
    $package->delete();

    return response()->json(['message' => 'Package succesfully deleted'], 200);
  }
}
