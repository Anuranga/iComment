## PHPUnit

### Code Coverage

PHPUnit can create a code coverage report.

    phpunit --coverage-html tests/coverage

The above command will generate detailed coverage report which will be placed inside
`tests/coverage`.

    WARNING
    Under no circumstance should you place the `coverage` directory inside the
    `public` directory. This will expose the entire source code to the public.
    