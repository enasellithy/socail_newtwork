```json
{
  "$id": "CommentController",
  "$schema": "https://json-schema.org/draft-07/schema#",
  "title": "Comment Controller",
  "description": "Handles comments API requests",
  "type": "object",
  "properties": {
    "commentService": {
      "type": "object",
      "$ref": "#/CommentService"
    }
  },
  "required": [
    "commentService"
  ],
  "CommentService": {
    "$id": "#/CommentService",
    "title": "Comment Service",
    "description": "Provides methods to interact with comments",
    "type": "object",
    "properties": {
      "create": {
        "title": "Create Comment",
        "description": "Creates a new comment from provided data",
        "type": "object",
        "properties": {
          "data": {
            "type": "object",
            "properties": {
              "commentText": {
                "type": "string",
                "description": "Text of the comment"
              },
              "commentatorId": {
                "type": "integer",
                "description": "ID of the comment's author"
              }
            },
            "required": [
              "commentText",
              "commentatorId"
            ]
          }
        },
        "required": [
          "data"
        ]
      }
    }
  }
}
```

```markdown
# CommentController
## Overview
Handles API requests related to comments.

## Dependencies
- `CommentService`: Provides methods to interact with comments.

## Methods
### create
Creates a new comment.

#### Parameters
- `commentText` (string): Text of the comment.
- `commentatorId` (integer): ID of the comment's author.

#### Returns
- Response from the `CommentService`.
```