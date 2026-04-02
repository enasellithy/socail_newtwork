**LikeResource Documentation**
==========================

**Properties**
------------

*   **`id`**: The unique identifier of the like record.
*   **`user`**: Information about the user who made the like, represented by a `UserResource` object.

**Resource Definition**
----------------------

### JSON Format

```json
{
  "$schema": "https://json-schema.org/draft-07/schema#",
  "type": "object",
  "properties": {
    "id": {
      "type": "integer",
      "description": "The unique identifier of the like record."
    },
    "user": {
      "$ref": "#/definitions/UserResource"
    }
  },
  "definitions": {
    "UserResource": {
      "type": "object",
      "properties": {
        "id": {"type": "integer"},
        "name": {"type": "string"},
        "email": {"type": "string"}
      },
      "required": ["id", "name", "email"]
    }
  }
}
```

**Class Definition**
-------------------

### PHP

```php
namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @package App\Http\Resources\API
 */
class LikeResource extends JsonResource
{
    /**
     * Return a collection of model instances.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
        ];
    }
}
```

### Documentation Comments

```php
/**
 * @SWG\Resource(
 *   title="Like Resource",
 *   description="Resource for representing a like within the system.",
 *   consumes={"application/json"},
 *   produces={"application/json"},
 * )
 */
```
  
Remember to use proper PHP Docblocks to enable API documentation generation tools like Swagger or PHPDoc. Always keep your code readable and well-documented for easier maintenance and scalability.