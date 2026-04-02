```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "PostResource",
  "description": "A resource representing a post in the API",
  "type": "object",
  "properties": {
    "id": {
      "description": "The unique ID of the post",
      "type": "integer"
    },
    "content": {
      "description": "The content of the post",
      "type": "string"
    },
    "media": {
      "description": "The URL of the media associated with the post",
      "type": "string",
      "format": "uri"
    },
    "writer": {
      "description": "The user who wrote the post",
      "$ref": "#/definitions/UserResource"
    },
    "comment_count": {
      "description": "The number of comments on the post",
      "type": "integer"
    },
    "like_count": {
      "description": "The number of likes on the post",
      "type": "integer"
    },
    "share_count": {
      "description": "The number of shares of the post",
      "type": "integer"
    },
    "comments": {
      "description": "A collection of comments on the post",
      "$ref": "#/definitions/CommentResourceCollection"
    },
    "like_list": {
      "description": "A collection of users who liked the post",
      "$ref": "#/definitions/LikeResourceCollection"
    },
    "share_list": {
      "description": "A collection of users who shared the post",
      "$ref": "#/definitions/ShareResourceCollection"
    }
  },
  "definitions": {
    "UserResource": {
      "title": "UserResource",
      "description": "A resource representing a user in the API",
      "type": "object"
    },
    "CommentResourceCollection": {
      "title": "CommentResourceCollection",
      "description": "A collection of resource representing comments in the API",
      "type": "array",
      "$items": {
        "$ref": "#/definitions/CommentResource"
      }
    },
    "CommentResource": {
      "title": "CommentResource",
      "description": "A resource representing a comment in the API",
      "type": "object"
    },
    "LikeResourceCollection": {
      "title": "LikeResourceCollection",
      "description": "A collection of resource representing likes in the API",
      "type": "array",
      "$items": {
        "$ref": "#/definitions/LikeResource"
      }
    },
    "LikeResource": {
      "title": "LikeResource",
      "description": "A resource representing a like in the API",
      "type": "object"
    },
    "ShareResourceCollection": {
      "title": "ShareResourceCollection",
      "description": "A collection of resource representing shares in the API",
      "type": "array",
      "$items": {
        "$ref": "#/definitions/ShareResource"
      }
    },
    "ShareResource": {
      "title": "ShareResource",
      "description": "A resource representing a share in the API",
      "type": "object"
    }
  }
}
```
```markdown
## PostResource
### Description
A resource representing a post in the API.

### Properties
#### id
The unique ID of the post.

Type: Integer

#### content
The content of the post.

Type: String

#### media
The URL of the media associated with the post.

Type: String
Format: URI

#### writer
The user who wrote the post.

Type: [UserResource](#userrresource)

#### comment_count
The number of comments on the post.

Type: Integer

#### like_count
The number of likes on the post.

Type: Integer

#### share_count
The number of shares of the post.

Type: Integer

#### comments
A collection of comments on the post.

Type: [CommentResourceCollection](#commentresourcecollection)

#### like_list
A collection of users who liked the post.

Type: [LikeResourceCollection](#likeresourcecollection)

#### share_list
A collection of users who shared the post.

Type: [ShareResourceCollection](#sharesresourcecollection)

### Definitions

#### UserResource
A resource representing a user in the API.
See: [UserResource Documentation](#userrresource)

#### CommentResourceCollection
A collection of resource representing comments in the API.
See: [CommentResource Documentation](#commentresource)

#### CommentResource
A resource representing a comment in the API.
See: [CommentResource Documentation](#commentresource)

#### LikeResourceCollection
A collection of resource representing likes in the API.
See: [LikeResource Documentation](#likeresource)

#### LikeResource
A resource representing a like in the API.
See: [LikeResource Documentation](#likeresource)

#### ShareResourceCollection
A collection of resource representing shares in the API.
See: [ShareResource Documentation](#sharesresource)

#### ShareResource
A resource representing a share in the API.
See: [ShareResource Documentation](#sharesresource)
```