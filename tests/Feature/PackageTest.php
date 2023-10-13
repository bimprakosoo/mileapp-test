<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PackageTest extends TestCase
{
  public function testStorePackage(): void
  {
    $data = json_decode(file_get_contents(__DIR__ . '/../../data.json'), true);
    $response = $this->postJson('/api/package', $data);

    $response->assertStatus(201);
    $response->assertJson(["Message" => "Package successfully saved"]);
  }

  public function testGetAllPackages()
  {
    $response = $this->get('/api/package');

    $response->assertStatus(200);
    $response->assertJsonStructure(['packages']);
  }

  public function testGetPackagesId()
  {
    $response = $this->get('/api/package/' . 'd0090c40-539f-479a-8274-899b9970bddc');

    $response->assertStatus(200);
    $response->assertJsonStructure(['package']);
  }

  public function testPackageNotFound()
  {
    $response = $this->get('/api/package/12345');

    $response->assertStatus(404);
    $response->assertJson(['message' => 'Package not found']);
  }
}
