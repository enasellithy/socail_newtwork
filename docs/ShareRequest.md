**Tool Definition: ShareRequest API Validator**

### Overview

This tool is designed to validate incoming requests for sharing posts in a Laravel API. It ensures that the provided data meets the necessary requirements before processing the request.

### Request Parameters

| Parameter | Type | Required | Description |
| --- | --- | --- | --- |
| post_id | numeric | Required | The ID of the post to be shared. Must exist in the `posts` table. |

### Validation Logic

- `post_id` is required and must be a numeric value.
- `post_id` must exist in the `posts` table.

### Error Handling

If validation fails, an HTTP response exception is thrown with a corresponding error message.

### Technical Details

*   Authorizability: This tool can be used by anyone.
*   API Request Handling: JSON format.

### Request-Object Format

```json
{
    "post_id": int
}
```

### Returns

The validation result or an error message upon failure.

### Notes

Please ensure that the `posts` table exists in the database and contains the necessary records for this tool to function correctly.