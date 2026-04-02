### UserResource Definition

#### Overview

The UserResource class is responsible for transforming a user model into a JSON response. It handles the conversion of user data, including their image, into a format suitable for API consumption.

#### Implementation Details

#### Input Data Structure

Input data is expected to be a user model instance with the following properties:

* `id`
* `name`
* `email`
* `image` (file path or null)
* `bio`
* `provider` (collection of ProviderResource instances)

#### Output Data Structure

The UserResource class converts the input data into the following JSON structure:

```json
{
    "id": int,
    "name": string,
    "email": string,
    "image": string (URL or empty string),
    "bio": string,
    "provider": array of provider data
}
```

#### Implementation Notes

* The `provider` property is a collection of ProviderResource instances, which are assumed to be defined separately.
* The `image` property is a file path, which is converted to a URL using the `asset` method.
* The `bio` property is a string, representing the user's bio.
* The other properties are self-explanatory.

#### Technical Requirements

* Laravel 8 or later
* Filesystem helper (`File`) for asset generation

#### Example Usage

```php
// Create a new User resource from a user model instance
$user = User::find(1);
$userResource = new UserResource($user);
$jsonResponse = $userResource->toJson();
```