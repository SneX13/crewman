# PHP Developer Test Case

Below are a set of statements that reflects how the application shall work:
> * An employee is a person with a first name, last name and identification
      number in the format OSMA[5-digit integer]. 
> * An employee can only have one current employment but may have multiple
      future and/or past employments.
> * If an employee has no employment, he/she is inactive. 
> * An employment may have none, one, or multiple assignments, past, current
      and/or future.
> * An assignment is given by an employer. 
> * An assignment is located in one or more countries.
> * While on an assignment, the employee has several roles. 
> * Each role has a start-date and end-date.
> * Each role has one of two types: Qualification or Position.
> * While on an assignment, the employee may have one or more leaves.
> * Each leave has a start-date and end-date.
> 1. Based on the information provided, create an ER-diagram of the database.
> 2. In an empty Laravel application, implement the following:
> * a. The models corresponding to the entities you modelled in task 1.
> * b. A page which lists all employees (first name, last name, id-number) and
  their most recent employer.
> * c. A page which details a given employee’s employment-profile, showing
  his/her past, present & future employments and associated
  assignments (with roles and leaves).
> * d. Brand the application iaw. the visual profile

## Table of Contents

- [Installation](#installation)
- [ER-diagram](#diagram)
- [Todo](#todo)

## Installation
#### Requirements
 * Composer, 
 * Node, 
 * npm

```bash
composer install
```
```bash
npm install
```
```bash
php artisan key:generate
```
```bash
php artisan migrate --seed
```
```bash
php artisan serve
```

### Built With

* [Laravel](https://laravel.com/) - The web framework used
* [Vue](https://vuejs.org/) - Front-end framework
* [Vuetify](https://vuetifyjs.com/) - Material Design component framework
* [Valet](https://laravel.com/docs/5.8/valet) - Development environment

## Diagram

```
```

###Todo

* Make better seeder for employee_id in Employments table (it should be unique if employment status is current )
* Write tests
* Make better visual presentation of data on employee profile page
