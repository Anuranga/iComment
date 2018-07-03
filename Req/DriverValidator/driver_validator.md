**PickMe Driver API**

[<< Back ](Req/index.md)

## Driver Validator
The `DriverValidator` module contains following use cases.



### Validate
The driver session contains the payload of the JWT token passed around. In order to do changes to
a driver the driver id sent by front end and the driver id of the session should be identical.

##### 1. The `Validate` use cases will do the following.

- Check whether the driver id sent is actually the logged in driver.
    (A driver can only query or change his/her details)