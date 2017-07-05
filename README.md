# Exads Test

Test submitted by Exads company, Tasks:

 1. **FizzBuzz**

Write a PHP script that prints all integer values from 1 to 100.
For multiples of three output "Fizz" instead of the value and for the multiples of five output "Buzz".
Values which are multiples of both three and five should output as "FizzBuzz".

I decided to do with concatenation to be better readable.

2. **500 Element Array**

In this one I used array_rand instead of array_compare to have one step less to check the arrays.

3. **Database Connectivity**

The class it's a kind of ORM approach, a class per table, having the PDO connection injected so it's possible to test it without real Connection with a stub object.

4. **Date Calculation**

This one it's just a matter of using Php's date/time strings, defining first if need to pick next Saturday or next Wednesday.

5. **A/B Testing**

The easiest way it's filling an array with 100 elements based on the probability and pick a random key/value from it.

## Dependencies

- PHP 7
- Composer

## How to run

Install all dependecies with composer:

```sh
composer install
```

Run the Test suit Case

```sh
php bin/phpunit
```