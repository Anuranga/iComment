### RAML
The API is structured using `RAML (RESTful API Modeling Language)`. The complete RAML document written for this project is at `documentation` folder.

Once the `RAML` project is completed it can be used to generate an API documentation as well as a single .raml file that can be used in the API console.

To do this several `npm` packages are needed

### API Documentation Generator
The API documentation is generate using the [raml2html](https://github.com/raml2html/raml2html) npm package.

**Install `raml2html`**

    $ npm install -g raml2html@0.8.0

**Generate API Document**

    $ raml2html driver-api-doc.raml > ../public/doc/index.html
    
(NOTE: In this case the input would be the `driver-api-doc.raml` which is the main access point for the RAML project. 
       and the output would be `index.html` which is placed at `public\doc` folder)

### API Console
The API console is a fully featuring API sandbox provided by RAML. You cannot use the RAML project in the API console as it is.
This is due to the fact that the API console requires a single `.raml` file to parse.
`ramlMerge` PHP script is used to generate this `.raml file` from the RAML project. It is already in the RAML project folder.

**Create a Single .raml File**
To run this PHP executable should be in your system path.

    $ php ramlMerge.php driver-api-doc.raml > ../public/doc/console/api-doc.raml

The generated file should be named as `api-doc.raml` and placed in the `public/doc/console` folder.

### Swagger.json Generator
A `swagger.json` file can be generated using the RAML project using the `api-spec-converter` `npm` package.

**Install `api-spec-converter`**

    $ npm install -g api-spec-converter

**Create swagger.json**

    $ api-spec-converter driver-api-doc.raml --from=raml --to=swagger_2 > ../public/doc/swagger/swagger.json
