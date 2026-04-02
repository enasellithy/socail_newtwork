```json
{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "title": "Post Controller Definition",
  "type": "object",
  "properties": {
    "name": {
      "type": "string",
      "description": "Controller name"
    },
    "namespace": {
      "type": "string",
      "description": "Controller namespace"
    },
    "construct": {
      "type": "object",
      "properties": {
        "postService": {
          "type": "string",
          "description": "Dependency injection for PostService"
        }
      },
      "required": [
        "postService"
      ]
    },
    "methods": {
      "type": "array",
      "items": {
        "type": "object",
        "properties": {
          "name": {
            "type": "string",
            "description": "Method name"
          },
          "description": {
            "type": "string",
            "description": "Method description"
          },
          "request": {
            "type": "string",
            "description": "Method request object"
          },
          "response": {
            "type": "object",
            "properties": {
              "type": {
                "type": "string",
                "description": "Method response type"
              },
              "message": {
                "type": "string",
                "description": "Method response message"
              }
            },
            "required": [
              "type",
              "message"
            ]
          },
          "parameters": {
            "type": "array",
            "items": {
              "type": "object",
              "properties": {
                "name": {
                  "type": "string",
                  "description": "Parameter name"
                },
                "type": {
                  "type": "string",
                  "description": "Parameter type"
                }
              },
              "required": [
                "name",
                "type"
              ]
            }
          }
        },
        "required": [
          "name",
          "description",
          "request",
          "response",
          "parameters"
        ]
      }
    }
  },
  "required": [
    "name",
    "namespace",
    "construct",
    "methods"
  ]
}

{
  "name": "PostController",
  "namespace": "App\Http\Controllers\API",
  "construct": {
    "postService": "App\SOLID\Services\PostService"
  },
  "methods": [
    {
      "name": "index",
      "description": "Return a list of user posts",
      "request": "",
      "response": {
        "type": "array",
        "message": "List of user posts"
      },
      "parameters": []
    },
    {
      "name": "store",
      "description": "Create a new post",
      "request": "AddPostRequest",
      "response": {
        "type": "object",
        "message": "Newly created post"
      },
      "parameters": []
    },
    {
      "name": "show",
      "description": "Return a specific post",
      "request": "",
      "response": {
        "type": "object",
        "message": "Specific post"
      },
      "parameters": [
        {
          "name": "id",
          "type": "integer"
        }
      ]
    },
    {
      "name": "destroy",
      "description": "Delete a specific post",
      "request": "",
      "response": {
        "type": "boolean",
        "message": "Post deletion status"
      },
      "parameters": [
        {
          "name": "id",
          "type": "integer"
        }
      ]
    }
  ]
}
```