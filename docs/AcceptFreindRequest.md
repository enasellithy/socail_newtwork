```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "Accept Friend Request",
  "description": "API Request to Accept Friend Request",
  "type": "object",
  "properties": {
    "id": {
      "type": "integer",
      "description": "Friend ID",
      "required": true
    }
  },
  "required": [
    "id"
  ]
}
```

**API Documentation**

### Accept Friend Request

#### POST /accept-friend-request

Accept a friend request.

#### Request Body

| Field | Type | Description | Required |
| --- | --- | --- | --- |
| id | integer | Friend ID | Yes |

#### Validation Rules

- `id` (integer): Friend ID. Required.

#### Error Handling

In case of validation failure, a HTTP response exception is thrown with a JSON error message.

#### Example Request

```bash
POST /accept-friend-request HTTP/1.1
Content-Type: application/json

{
  "id": 1
}
```