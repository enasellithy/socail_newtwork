## Technical Documentation: Google Auth Controller
======================================================

### Class Overview

The Google Auth Controller is responsible for handling the Google authentication flow.

### Properties

*   `$socialAuthService`: An instance of the social authentication service.

### Constructor

*   **`__construct(SocialAuthService $socialAuthService)`**: Initializes the controller with an instance of the social authentication service.

### Methods

#### `auth()`

*   **Purpose**: Redirects the user to the Google authentication page.
*   **Return Value**: A redirect response to the Google authentication page.
*   **Notes**: Uses Socialite to redirect the user to the Google authentication page in stateless mode.

#### `callback()`

*   **Purpose**: Handles the callback from Google after the user has authenticated.
*   **Return Value**: The result of calling the `callbackGoogle` method on the social authentication service.
*   **Notes**: Delegates the callback handling to the social authentication service.

### Dependencies

*   `SocialAuthService`: A service responsible for handling social authentication callbacks.

### Example Usage

```php
$googleAuthController = new \App\Http\Controllers\API\Auth\GoogleAuthController(
    new \App\SOLID\Services\SocialAuthService()
);

// Redirect the user to the Google authentication page
$result = $googleAuthController->auth();

// Handle the callback from Google
$result = $googleAuthController->callback();
```

### Technical Requirements

*   Laravel framework (version 8 and above)
*   Socialite package (version 12 and above)
*   SOLID package (version 1 and above)