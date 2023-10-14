# Laravel 10 and MongoDB Package API

A Rest API that use Laravel 10 and MongoDB

# Setup

* Clone the repository using `git clone https://github.com/bimprakosoo/mileapp-test.git`
* Navigate to the project directory
* Run `composer install` to install the dependencies
* Install MongoDB, refer to the official documentation for instructions https://www.mongodb.com/docs/manual/installation/
* Setup your database by creating `.env` file
* Update the following lines in the `.env` file with your MongoDB connection details:
<pre><code>DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password</code></pre>
* Start the server with `php artisan test`
* Run the unit tests with `php artisan test`

# Testing the API

* Get All Packages: Send a `GET` request to `http://127.0.0.1:8000/api/package/` to get all packages
* Get a Package with ID: Send a `GET` request to `http://127.0.0.1:8000/api/package/transaction_id` to get the package 
* Create a new Package: Send a `POST` request to `http://127.0.0.1:8000/api/package` to create a new data package
* Update a Package with PUT: Send `PUT` request to `http://127.0.0.1:8000/api/package/transaction_id` to update package using put method.
* Update a Package with PATCH: Send `PATCH` request to `http://127.0.0.1:8000/api/package/transaction_id` to update package using patch method.
* Delete a Package: Send a `DELETE` request to `http://127.0.0.1:8000/api/package/transaction_id` to delete the package

## Documentation of the API can be seen on this link https://documenter.getpostman.com/view/20660921/2s9YR57FB7