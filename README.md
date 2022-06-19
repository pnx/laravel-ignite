# Laravel Ignite

Laravel ignite is a package that provides the developer with rich web-ui compnents that are independent of browsers and can be fully styled to help developers deliver stylish application with coherent visual design.

Never build your html forms from scratch again as ignite takes care of that for you.

## Features

* Fully CSS Styled components that can be customized.
* built in [CSRF field](https://laravel.com/docs/8.x/blade#csrf-field).
* Built in spoofing of [PUT, PATCH, or DELETE requests](https://laravel.com/docs/8.x/blade#method-field).
* Support for [laravel validation](https://laravel.com/docs/8.x/blade#validation-errors) out of the box.
* Custom select field.
* Custom radio/checkbox field.
* Custom fields such as date selection, and searchable dropdowns (separate packages)

Under the hood, Laravel ignite uses [Alpinejs](https://alpinejs.dev) and [Tailwind CSS](https://tailwindcss.com)

## Installation

You can install the package via composer:

`composer require pnx/laravel-ignite`

The package should be auto discovered by laravel.

If that is not the case, you need to add the `ServiceProvider` manually in the **providers** array in `config/app.php`:

```php
'providers' => [

    ...

    /*
     * Package Service Providers...
     */
    Ignite\ServiceProvider::class,

    ...
],
```
## Configuration

Ignite can be configured the way you want it if the default settings is not enough.

To publish the config file `config/ignite.php`. Run this command:

`php artisan vendor:publish --tag=ignite-config`

If you want to modify the view scripts, you can publish those to `resources/views/vendor/ignite` with this command:

`php artisan vendor:publish --tag=ignite-views`

## Component Attributes

All standard input attributes are of course available to ignite components.

However some behaviors are altered for some attributes described below

#### name

This attribute is required

#### id

If `id` attribute is absent, components will use `name` as `id`

##### value

The value passed to a component is passed through laravels `old()` [view helper](https://laravel.com/docs/8.x/requests#retrieving-old-input) function.

Components will therefore use the old values if they are present in the request, otherwise the user provided default is used.

#### disabled

This is a boolean variable and when true, will render the html input field with `disabled="disabled"`

## Components

This package provides the developer with alot of prewritten view components:

### Form

```html
<x-ignite-form method="DELETE" action="/some/url">
    ...
</x-ignite-form>
```

##### Attributes

`method` - HTTP method to use when the form is submitted `GET`, `POST`, `HEAD`, `PUT`, `DELETE` is valid, default: `POST`

### Label

Generates a label element.

```html
<x-ignite-label for="username">Username</x-ignite-label>
```

##### Attributes

`type` - Type of label to render, values: `block`, `inline`, defaults to `block`

### input

Generates a input element

```html
<x-ignite-input name="username" class="px-4 py-2"/>
```

```html
<x-ignite-input type="password" name="password" class="px-4 py-2"/>
```

##### Attributes

`type`: type of input element, defaults to `text`

### Password input

Shortcut for `<x-ignite-input>` with `type="password"`

```html
<x-ignite-password name="password" placeholder="Password" class="px-4 py-2" />
```

### Email input

Shortcut for `<x-ignite-input>` with `type="email"`

```html
<x-ignite-email name="email" placeholder="Email address" class="px-4 py-2" />
```

### Select

Generates a simple select dropdown element

```html
<x-ignite-select name="fruit" :options="[ 'Apple', 'Pear', 'Lemon' ]" class="px-4 py-2" />
```

Associative array

```html
<x-ignite-select name="role" :options="['admin' => 'Admin', 'writer' => 'Writer', 'guest' => 'Guest']" class="px-4 py-2" />
```

##### Attributes

`options`: array of options to show in the select dropdown. **array keys** are used as *value* of the field when submitted and **array values** are *displayed* in the dropdown.

### Textarea

```html
<x-ignite-textarea name="message" class="px-4 py-2" />
```

### Checkbox

Generates a checkbox element

```html
<x-ignite-checkbox name="user_banned" class="px-4 py-2" />
```

> NOTE: the value submitted is "true" or "false" strings.

### Radio

Generates a group of one or more radio buttons.

```html
<x-ignite-radio name="fruit" :options="[ 'Apple', 'Pear', 'Lemon' ]" class="px-4 py-2" />
```

##### Attributes

`options`: array of options, each option will render a separate radio button. **array keys** are used as *value* of the field when submitted and **array values** are *displayed* next to the radio button.

### Toggle switch

Same as checkbox but rendered as a toggle switch instead of an box.

```html
<x-ignite-toggle-switch name="user_banned" class="px-4 py-2" />
```

## Author

Henrik Hautakoski - [henrik.hautakoski@gmail.org](mailto:henrik.hautakoski@gmail.org)
