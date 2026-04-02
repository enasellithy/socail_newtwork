## Login Request Schema

### Description

This is a login request schema used in the application for authenticating users.

### Rules

#### email

*   Required
*   Must be a valid email address
*   Must exist in the `users` table

#### password

*   Required
*   Must be at least 6 characters long
*   Must not exceed 25 characters

### Error Handling

When validation fails, an `HttpResponseException` is thrown with the first validation error message as the response.

### Technical Details

*   **API Request**: `POST /auth/login`
*   **Response Format**: `application/json`
*   **Status Codes**:
    *   `200 OK`: Successful authentication
    *   `422 Unprocessable Entity`: Invalid request parameters
*   **Request Body**: Expecting `email` and `password` fields
*   **Example Request**: `{"email": "user@example.com", "password": "password123"}`
*   **Example Response**: `{"email": "user@example.com"}`
*   **Error Response**: `{"error": "Invalid email or password"}`
*   **JSON Schema Validation**: Can be used for JSON schema validation using libraries like `json-schema`
*   **Validation Engine**: Built-in Laravel validation engine

### Example Usage

```json
POST /auth/login HTTP/1.1
Host: example.com
Content-Type: application/json

{
    "email": "user@example.com",
    "password": "password123"
}
```

Response:

```json
HTTP/1.1 200 OK
Content-Type: application/json

{
    "email": "user@example.com"
}
```

In case of validation errors:

```json
HTTP/1.1 422 Unprocessable Entity
Content-Type: application/json

{
    "error": "Invalid email or password"
}
```