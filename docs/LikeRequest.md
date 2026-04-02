```json
{
    "$schema": "http://json-schema.org/draft-07/schema#",
    "title": "Like Request",
    "description": "API request for liking a post",
    "type": "object",
    "properties": {
        "post_id": {
            "description": "The ID of the post to like",
            "type": "integer",
            "minimum": 1,
            "exclusiveMaximum": true,
            "dependencies": {
                "required": true,
                "numeric": true,
                "exists": ["#","posts","id"]
            }
        }
    },
    "additionalProperties": false,
    "required": [
        "post_id"
    ]
}
```

**Laravel Like Request Technical Documentation**

## Overview

The Like Request is an API request used to like a post. This request is handled by the Laravel framework and is validated using the provided rules.

## Validation Rules

### Required Fields

*   **post_id**: The ID of the post to like (required)

### Type Specifications

*   **post_id**: An integer representing the ID of the post to like

### Validation Rules

*   **post_id**: The post ID must exist in the `posts` table with a valid ID (numeric and minimum 1) and must be required.

## Error Handling

The failed validation returns a JSON response with the error message specified in the validation rules.

### Error Example

```json
{
    "message": "Validation failed for example errors",
    "errors": {
        "post_id": {
            "request": "required and exists"
        }
    }
}
```

## Note

The above JSON schema uses Draft 07 format, you can adjust it according to your needs and follow the official specification for better compatibility. 

Also, since it's a JSON schema definition, it's good practice to store it in a separate file (e.g., `like_request.schema.json`) and use it throughout your codebase to validate and generate documentation.