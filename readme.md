# Notifications message for laravel 5 with Pnotify

[![Build Status](https://travis-ci.org/jorgejavierleon/LaravelPnotify.svg?branch=master)](https://travis-ci.org/jorgejavierleon/LaravelPnotify)

This package give you a Laravel 5 implementation for flash messages or notifications with [Pnotify](http://sciactive.github.io/pnotify/) javascript library.

Within your controllers you can use the Facade and get the flash message in the next request:

```php
public function store()
{
    $user->save();
    
    Notify::success('The user has been created');
    
    return view('home')
    
}
```


## Installation

Begin by installing this package through Composer.

```js
{
    "require": {
        "jorgejavierleon/laravelPnotify": "~1.0"
    }
}
```

Include the service provider within config/app.php.
 
```php

// app/config/app.php

'providers' => [
    ...,
    Jleon\LaravelPnotify\NotifyServiceProvider::class,
];
```

If you want to use the facade, add the alias to the aliases array at the bottom of config/app.php:

```php

// app/config/app.php

'aliases' => [
    ...,
    'Notify' => Jleon\LaravelPnotify\Notify::class,
];
```


#### Pnotify

You'll need to include the Pnotify files in your views. jQuery is also require. For the complete guide refer to the [documentation](https://github.com/sciactive/pnotify).

A typical instalation, with [Bootstrap](http://getbootstrap.com/) styling and the buttons component, will include the following

```html
    {{--Bootstrap--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{--Pnotify--}}
    <link rel="stylesheet" href="/css/pnotify/pnotify.core.min.css"/>
    <link rel="stylesheet" href="/css/pnotify/pnotify.buttons.min.css"/>
    
    {{--jQuey--}}
    <script type="text/javascript" src="/js/jquery/jquery-2.1.4.min.js"></script>
    {{--Bootstrap--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{--Pnotify--}}
    <script type="text/javascript" src="/js/pnotify/pnotify.core.min.js"></script>
    <script type="text/javascript" src="/js/pnotify/pnotify.buttons.min.js"></script>

```

> Bootstrap is not require but is the default style of the package. You can change this in the configurations.

#### View

Finally, you'll need to use the view that come with this package, or create one for yourself, to display the notifications.

To use the view that comes by default, include `laravelPnotify::notify` after the Pnotify js files

```html
    {{--Pnotify--}}
    <script type="text/javascript" src="/js/pnotify/pnotify.core.min.js"></script>
    <script type="text/javascript" src="/js/pnotify/pnotify.buttons.min.js"></script>
    
    @include('laravelPnotify::notify')
```

The view included is very simple, it just check the session and build the Pnotify object

```html
    @if (Session::has('notifier.notice'))
        <script>
            new PNotify({!! Session::get('notifier.notice') !!});
        </script>
    @endif
```


## Usage

#### Basic notices

You'll get the customary notification methods:

- `Notify::success('require body', 'optional title')`
- `Notify::info('require body', 'optional title')`
- `Notify::warning('require body', 'optional title')`
- `Notify::error('require body', 'optional title')`

> If you don't include a title, the body of the notice will be formatted as a title to enhance visibility

#### Sticky notices

By default this notifications will fadeout in 8 seconds, but you can persist the notification by chaining a sticky method

`Notify::info('This notice won't fadeout')->sticky()`

## Customize

You can customize any configurations for the basic notice module. To customize the defaults you can publish the config file by running
 
```bash
    php artisan vendor:publish
```

Or just create your own config file `config/laravelPnotify` and override only the ones you need

```php
    //config/laravelPnotify
   <?php
   
   return [
   
       /*
        * The notice's title.
       */
       'title' => false,
   
       /*
        * Whether to escape the content of the title. (Not allow HTML.)
       */
       'title_escape' => false,
   
       /*
        * The notice's text.
       */
       'text' => false,
   
       /*
        * Whether to escape the content of the text. (Not allow HTML.)
       */
       'text_escape' => false,
   
       /*
        * What styling classes to use.
        * Can be either "brighttheme", "jqueryui", "bootstrap2", "bootstrap3", "fontawesome", or a custom style object.
        * See the source in the end of pnotify.core.js for the properties in a style object.)
       */
       'styling' => 'bootstrap3',
   
       /*
        * Additional classes to be added to the notice. (For custom styling.)
       */
       'addclass' => '',
   
       /*
        * Class to be added to the notice for corner styling.
       */
       'cornerclass' => '',
   
       /*
        * Display the notice when it is created.
        * Turn this off to add notifications to the history without displaying them.
       */
       'auto_display' => true,
   
       /*
        * Width of the notice
       */
       'width' => '300px',
   
       /*
        * Minimum height of the notice. It will expand to fit content.
       */
       'min_height' => '16px',
   
       /*
        * Type of the notice. "notice", "info", "success", or "error".
       */
       'type' => 'notice',
   
       /*
        * Set icon to true to use the default icon for the selected style/type,
        * false for no icon, or a string for your own icon class.
       */
       'icon' => true,
   
       /*
        * The animation to use when displaying and hiding the notice.
        * "none", "show", "fade", and "slide" are built in to jQuery.
        * Others require jQuery UI. Use an object with effect_in and effect_out to use different effects.
       */
       'animation' => 'fade',
   
       /*
        * Speed at which the notice animates in and out.
        * "slow", "def" or "normal", "fast" or number of milliseconds.
       */
       'animate_speed' => 'slow',
   
       /*
        * Specify a specific duration of position animation.
       */
       'position_animate_speed' => 500,
   
       /*
        * Opacity of the notice.
       */
       'opacity' => 1,
   
       /*
        * Display a drop shadow.
       */
       'shadow' => true,
   
       /*
        * After a delay, remove the notice.
       */
       'hide' => true,
   
       /*
        * Delay in milliseconds before the notice is removed.
       */
       'delay' => 8e3,
   
       /*
        * Reset the hide timer if the mouse moves over the notice.
       */
       'mouse_reset' => true,
   
       /*
        * Remove the notice's elements from the DOM after it is removed.
       */
       'remove' => true,
   
       /*
        * Change new lines to br tags.
       */
       'insert_brs' => true,
   
   ]; 
```    
 


#### Override

If you need to override some defaults only for the next notice, use the override method and pass it an array of options

```php
    Notify::info('notice with overrides')->override([
        'animation' => 'slide', 
        'animate_speed' => 'normal',
    ])
```
