# Test task

## Description
This project is a PHP application that uses the Observer design pattern to manage state transitions and notify observers of state changes.

## Requirements
- PHP
- Composer

## Installation
1. Clone the repository:
    ```sh
    git clone <repository-url>
    ```
2. Navigate to the project directory:
    ```sh
    cd <project-directory>
    ```
3. Install dependencies using Composer:
    ```sh
    composer install
    ```

## Usage
1. Run the application:
    ```sh
    php index.php
    ```

## Running Tests
1. Run the tests using PHPUnit:
    ```sh
    ./vendor/bin/phpunit tests
    ```

## Project Structure
- `index.php`: Main entry point of the application.
- `tests/TeamLeadTest.php`: Contains unit tests for the `TeamLead` class.
- `.gitignore`: Specifies files and directories to be ignored by Git.
- `vendor/`: Directory for Composer dependencies.

## License
This project is licensed under the MIT License.