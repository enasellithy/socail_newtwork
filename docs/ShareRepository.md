**ShareRepository Documentation**
==================================

**Introduction**
---------------

The ShareRepository is a class responsible for managing share interactions between users and posts.

**Methods**
-----------

### create(array $data)

*   **Purpose:** Create or update a share interaction between a user and a post.
*   **Parameters:**
    *   `$data`: An array containing the post ID and other relevant data.
*   **Flow:**

    1.  Check if a share interaction already exists between the user and the post.
    2.  If it exists, delete the existing share.
    3.  Create a new share using the provided data or update the existing one.

**JSON Representation**
----------------------

```json
{
    "$id": "/ShareRepositoryMethods",
    "$schema": "http://json-schema.org/draft-07/schema#",
    "title": "ShareRepository Methods",
    "type": "object",
    "properties": {
        "create": {
            "$id": "/ShareRepositoryMethods/create",
            "type": "object",
            "properties": {
                "data": {
                    "$id": "/ShareRepositoryMethods/create/data",
                    "type": "object",
                    "properties": {
                        "post_id": {"$id": "/ShareRepositoryMethods/create/data/post_id", "type": "number"}
                    },
                    "required": [
                        "post_id"
                    ]
                }
            },
            "required": [
                "data"
            ]
        }
    }
}
```