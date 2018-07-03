**PickMe Driver API**

[<< Back ](Req/index.md)

## Detail Fetcher
The `DriverFetcher` module contains following use cases.



### Get Driver Profile
Return following driver details.
- id
- name
- phone number
- profile picture
- languages the driver can talk
- vehicle type
    - type id
    - type name
- passenger count
- luggage
- average speed
- bank account details 
    - bank name
    - bank branch name
    - bank account number

Use following tables to get these data.
- `people`
- `bank_accounts`
- `bank`
- `taxi_driver_mapping`
- `taxi`
- `motor_model`
- `driver_languages`

### Get Driver Profile Shift Summary
Return following details as shift summary.
- status
- rating
- whether the hire is a `directional hire`

Use following tables to get these data.
- `driver`
- `driver_ranking`

### Get Driver Daily Trip Summary
Return the summary of trips and earnings of the current day.
- completed jobs
- cancelled by passenger jobs
- cancelled by driver jobs
- today's earnings
- total time driven

Use `passengers_log_archive` table to get completed, cancelled by passenger and cancelled by driver trips.

Use the sum of `fare` in `transacation` to get today's earnings.

Use the sum of time difference in `minutes` between `drop_time` and `actual_pickup_time` to get today's total trip time.
