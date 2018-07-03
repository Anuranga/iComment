**PickMe Driver API**

[<< Back ](Req/index.md)

## Authenticator
The `Authenticator` module contains following use cases.



### Login
`Login` will validate the driver, set required statuses for the driver 
and provide a JSON Web Token (JWT).


##### 1. It will need following data to validate the driver.

    FIELD     | TYPE    | DESCRIPTION
    -------------------------------------------------------------------
    phone     | integer | The phone number used to register the driver
    password  | string  | password of the driver
    device_id | string  | Unique id to identify the device

> **NOTE:**
>   The `device_id` is important because it will be used to prevent login from multiple devices using valid credentials.


##### 2. The `Login` use case will do the following validations.

- Check whether there is a driver with provided credentials in `people` table.
- Check whether the driver is active.
- Check the current login status of the driver.
    - Check the `login_status` of `driver` table.
    - There are two statuses (`Y-Yes`, `N-No`). `login_status` should be `N`. If it's `Y` an `error` should be thrown
        saying that the driver is already logged in.


##### 3. It will perform following action after a successful validation.

- Update driver shift status.
    - Update the `shift_status` of `driver` table to `IN`.
- Generate a token (JWT).
    - The token should have following fields
        - `sub` (subject) containing `driver_id`
        - `jti` (jwt token id) containing a unique value (`driver id` + `current timestamp`)
- Preserve the token in a persistence layer.
    - Save the token to `driver_auth_token` table.



### Token Validation
`Token validation` is a `Middleware` use case that will execute every time a route that uses
that middleware is called.


##### 1. The `Token validation` use case will do the following validations and actions.

- Whether a token is sent in the request header as `Authentication`, `Bearer` or in 
request parameters as `token`.
- Whether the token is valid.
- Whether the token is blacklisted.
    - Check whether a record exists that has the `driver_id` and `token_id` provided
     by the token in `driver_auth_token` table.
- Whether the token is expired.


##### 2. It will perform following actions.
- If the token is expired it will be blacklisted.



### Logout
`Logout` will set required statuses of the driver and blacklist the token.

##### 1. `Logout` use case perform following actions.

- Blacklist the token.
    - Check whether the token exists in the `driver_auth_token` table and if so delete it.
- Update driver shift status.
    - Update the `shift_status` of `driver` table to `OUT`.


