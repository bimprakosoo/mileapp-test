<?php

namespace Tests\Feature;

use App\Models\Package;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class PackageTest extends TestCase
{
  public function testStorePackage(): array
  {
    $randomUuid = Str::uuid();
    $data = json_decode(file_get_contents(__DIR__ . '/../../data.json'), true);
    $data['transaction_id'] = $randomUuid->toString();
    $response = $this->postJson('/api/package', $data);

    $response->assertStatus(201);
    $response->assertJson(["Message" => "Package successfully saved"]);
    $package = Package::where('transaction_id', $data['transaction_id'])->first();

    return [
      'package' => $package->toArray()
    ];
  }

  public function testGetAllPackages()
  {
    $response = $this->get('/api/package');

    $response->assertStatus(200);
    $response->assertJsonStructure(['packages']);
  }

  public function testGetPackagesId()
  {
    $packageStored = $this->testStorePackage();
    $response = $this->get('/api/package/' . $packageStored['package']['transaction_id']);

    $response->assertStatus(200);
    $response->assertJsonStructure(['package']);
  }

  public function testPackageNotFound()
  {
    $response = $this->get('/api/package/12345');

    $response->assertStatus(404);
    $response->assertJson(['message' => 'Package not found']);
  }

  public function testPatchPackage()
  {
    $packageStored = $this->testStorePackage();
    $data = json_decode(file_get_contents(__DIR__ . '/../../data_patch.json'), true);
    $response = $this->patch('/api/package/' . $packageStored['package']['transaction_id'], $data);

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Package updated successfully']);

  }

  public function testPutPackage()
  {
    $packageStored = $this->testStorePackage();
    $data = json_decode(file_get_contents(__DIR__ . '/../../data_put.json'), true);
    $response = $this->put('/api/package/' . $packageStored['package']['transaction_id'], $data);

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Package updated successfully']);
  }

  public function testDeletePackage()
  {
    $packageStored = $this->testStorePackage();
    $response = $this->delete('/api/package/' . $packageStored['package']['transaction_id']);

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Package succesfully deleted']);
  }
}
