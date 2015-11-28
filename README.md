# CakePHP Application Skeleton

[![Build Status](https://api.travis-ci.org/cakephp/app.png)](https://travis-ci.org/cakephp/app)
[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.0.

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run:

    ```bash
    composer create-project --prefer-dist --stability=dev jorge/cakephp-skeleton [app_name]
    ```

3. Change the default TEMPLATE in: config/paths.php
4. Create database
5. Read and edit `config/app.php` and `config/app_local.php` and setup the 'Datasources' and any other configuration relevant for your application.
6. Run:

    ```bash
    bin/cake migrations migrate
    ```

7. Ok!