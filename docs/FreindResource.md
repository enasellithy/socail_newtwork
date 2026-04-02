```json
// FreindResource Documentation
// =================================

## Overview
### FreindResource Class Definition

The `FreindResource` class is a JSON resource in a Laravel application, responsible for serializing data related to friends.

### Properties

#### id
- **Description**: Unique identifier for the friend resource.
- **Type**: Integer.
- **Attributes**: Read-only.

#### created_at
- **Description**: Timestamp indicating when the friend relationship was created.
- **Type**: DateTime.
- **Attributes**: Read-only.

#### sender_id
- **Description**: Identifier for the user who sent the friend request.
- **Type**: Integer.
- **Attributes**: Read-only.
  * Associated Resource: UserResource (see ./UserResourceDocumentation)

#### recipient_id
- **Description**: Identifier for the user who received the friend request.
- **Type**: Integer.
- **Attributes**: Read-only.
  * Associated Resource: UserResource (see ./UserResourceDocumentation)

## Usage
### Serialization

`FreindResource` instances can be serialised to JSON using the standard Laravel resource methods, for example:

```php
$friend = App\Models\Friend::find(1);
$resources = new FreindResource($friend);
```

This will result in a JSON payload that includes the friend resource's `id`, `created_at`, `sender_id`, and `recipient_id`.

## Resource Relationships

- **Sender User**: Each sender of a friend request is represented by a `UserResource` instance at `sender_id`, which includes all the attributes and relationships associated with the `UserResource`.

- **Recipient User**: Each recipient of a friend request is represented by a `UserResource` instance at `recipient_id`, which includes all the attributes and relationships associated with the `UserResource`.

## Supported APIs
- JSON API
```