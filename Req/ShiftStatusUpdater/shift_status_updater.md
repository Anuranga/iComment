**PickMe Driver API**

[<< Back ](Req/index.md)

## Shift Status Updater
The `ShiftStatusUpdater` module contains following use cases.



### Change Shift Status
Set the shift status of the driver to either `IN` or `OUT`.

##### 1. Both `Shift Status In` and `Shift Status Out` use cases will do following validations.

- Check whether the driver id sent to change the shift status is actually the logged in driver.
    (A driver can only change his/her shift status)

##### 2. It will perform following action after a successful validation.

- Update driver shift status.
    - Update the `shift_status` of `driver` table to `IN` when asked to set it to `IN`.
    - Update the `shift_status` of `driver` table to `OUT` when asked to set it to `OUT`.
    