```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "Comment Resource",
  "description": "A resource representation of a comment",
  "type": "object",
  "properties": {
    "id": {
      "description": "Unique identifier of the comment",
      "type": "integer"
    },
    "comment": {
      "description": "Content of the comment",
      "type": "string"
    },
    "created_at": {
      "description": "Timestamp of the comment creation",
      "type": "string",
      "pattern": "^\\d{4}-\\d{2}-\\d{2} \\d{2}:\\d{2}$"
    },
    "user": {
      "description": "Resource representation of the user who made the comment",
      "type": "object",
      "properties": {
        "id": {
          "description": "Unique identifier of the user",
          "type": "integer"
        },
        "name": {
          "description": "Name of the user",
          "type": "string"
        }, // Assume additional information is provided by UserResource
        // Additional properties of UserResource will be listed here
      },
      "required": ["id", "name"]
    }
  },
  "required": ["id", "comment", "user"]
}
```

Or, if you prefer a simple documentation string as markdown:

```markdown
## CommentResource

### Description

Resource representation of a comment.

### Properties

* `id`: Unique identifier of the comment
* `comment`: Content of the comment
* `created_at`: Timestamp of the comment creation (Y-m-d h:i)
* `user`: Resource representation of the user who made the comment (see below)

### User

The user resource is represented as follows:

* `id`: Unique identifier of the user
* `name`: Name of the user
* Additional user information properties (not listed here)
```