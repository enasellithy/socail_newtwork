```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "Comment Request",
  "description": "Request for creating a comment",
  "type": "object",
  "properties": {
    "comment": {
      "description": "Comment body",
      "type": "object",
      "required": true,
      "properties": {
        "comment": {
          "description": "Comment text (min:3, max:100)",
          "type": "string",
          "minLength": 3,
          "maxLength": 100,
          "required": true
        }
      }
    },
    "post_id": {
      "description": "ID of the post the comment is related to",
      "type": "object",
      "required": true,
      "properties": {
        "post_id": {
          "description": "Post ID (numeric, exists in posts table)",
          "type": "integer",
          "minimum": 1,
          "maximum": 10000,
          "required": true,
          "enum": [
            "id"
          ]
        }
      }
    }
  },
  "required": [
    "comment",
    "post_id"
  ]
}
```

**Comment Request JSONAPI**

* `comment`: Object containing the comment text, with the following attributes:
  * `comment`: The text of the comment, with a minimum length of 3 and a maximum length of 100.
* `post_id`: Object containing the ID of the post the comment is related to, with the following attributes:
  * `post_id`: The ID of the post, a numeric value that exists in the `posts` table.

**Error Handling**

Error messages are generated in the format specified by the `whenError()` method. The first error message from the validator is returned in the response with a status code of 422.

**Authorization**

This request does not require any specific authorization, as specified by the `authorize()` method, which always returns `true`.

**Validation Rules**

The validation rules for this request are defined in the `rules()` method:

* `comment`:
  * `required`: The comment is required.
  * `string`: The comment must be a string.
  * `min:3`: The comment must have a minimum length of 3 characters.
  * `max:100`: The comment must have a maximum length of 100 characters.
* `post_id`:
  * `required`: The post ID is required.
  * `numeric`: The post ID must be a numeric value.
  * `exists:posts,id`: The post ID must exist in the `posts` table.