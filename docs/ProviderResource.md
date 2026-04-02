### Provider Resource Definition

#### Overview

The `ProviderResource` class is responsible for transforming a `Provider` model into a JSON response for API consumption.

#### Attributes

| Attribute | Description | Type | Required |
| --- | --- | --- | --- |
| `id` | Unique identifier for the provider | Integer | Yes |
| `provider` | Name of the provider | String | Yes |
| `provider_id` | Unique identifier for the provider (used for linking) | Integer | Yes |

### JSON Representation
```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "ProviderResource",
  "type": "object",
  "properties": {
    "id": {
      "type": "integer",
      "description": "Unique identifier for the provider"
    },
    "provider": {
      "type": "string",
      "description": "Name of the provider"
    },
    "provider_id": {
      "type": "integer",
      "description": "Unique identifier for the provider (used for linking)"
    }
  },
  "required": ["id", "provider", "provider_id"]
}
```

### Technical Documentation

#### Implementation Details

The `ProviderResource` class extends `Illuminate\Http\Resources\Json\JsonResource` and defines a single method `toArray(Request $request)`.

```php
public function toArray(Request $request): array
{
    return [
        'id' => $this->id,
        'provider' => $this->provider,
        'provider_id' => $this->provider_id,
    ];
}
```

This method returns an array representation of the provider data, which matches the defined JSON structure.

#### Usage

To use the `ProviderResource` class, create an instance of it and call the `toJson()` method to generate the JSON response.

```php
$provider = ... // retrieve a provider instance from the database
$providerResource = new ProviderResource($provider);
$jsonResponse = $providerResource->toJson();
```