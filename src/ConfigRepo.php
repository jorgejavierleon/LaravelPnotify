<?php


namespace Jleon\LaravelPnotify;


interface ConfigRepo
{
    /**
     * Get the specified configuration value.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return array
     */
    public function get($key, $default = null);

}