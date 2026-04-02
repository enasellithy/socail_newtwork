**FreindController Documentation**

### Overview

The `FreindController` is a RESTful API controller responsible for managing friend relationships between users. It utilizes the `FreindService` class to encapsulate the business logic of friend management.

### Methods

#### get_friend_list

*   **Description:** Retrieves a list of friends for the current user.
*   **Request Method:** `GET`
*   **Route:** `/friends`
*   **Response:** An array of `FreindResource` objects containing friend information.

#### send_friend_request

*   **Description:** Sends a friend request to another user.
*   **Request Method:** `POST`
*   **Route:** `/friends/request/{id}`
*   **Request Body:** `id` (UUID of the user to send the request to)
*   **Response:** A success message indicating the request has been sent.

#### get_Friend_Requests

*   **Description:** Retrieves a list of pending friend requests for the current user.
*   **Request Method:** `GET`
*   **Route:** `/friends/requests`
*   **Response:** An array of `FreindResource` objects containing friend request information.

#### accept_friend_request

*   **Description:** Accepts an incoming friend request.
*   **Request Method:** `POST`
*   **Route:** `/friends/requests/{id}/accept`
*   **Request Body:** `id` (UUID of the friend request to accept)
*   **Response:** A success message indicating the request has been accepted.

#### deny_Friend_Request

*   **Description:** Denies an incoming friend request.
*   **Request Method:** `POST`
*   **Route:** `/friends/requests/{id}/deny`
*   **Request Body:** `id` (UUID of the friend request to deny)
*   **Response:** A success message indicating the request has been denied.

#### unfriend

*   **Description:** Unfriends a user.
*   **Request Method:** `POST`
*   **Route:** `/friends/{id}/unfriend`
*   **Request Body:** `id` (UUID of the user to unfriend)
*   **Response:** A success message indicating the friendship has been ended.

#### blockFriend

*   **Description:** Blocks a user from sending friend requests.
*   **Request Method:** `POST`
*   **Route:** `/friends/{id}/block`
*   **Request Body:** `id` (UUID of the user to block)
*   **Response:** A success message indicating the user has been blocked.

#### unblockFriend

*   **Description:** Unblocks a user from sending friend requests.
*   **Request Method:** `POST`
*   **Route:** `/friends/{id}/unblock`
*   **Request Body:** `id` (UUID of the user to unblock)
*   **Response:** A success message indicating the user has been unblocked.

### Dependencies

*   `FreindService`: Encapsulates the business logic of friend management.
*   `FreindResource`: A JSON resource representing a friend.

### Notes

*   This API documentation is subject to change based on evolving requirements and specifications.
*   The API routes and methods may be modified or deprecated as necessary.
*   The `FreindService` class is expected to be implemented and injected into the controller.