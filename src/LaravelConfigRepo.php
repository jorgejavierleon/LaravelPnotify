<?php


namespace Jleon\LaravelPnotify;


class LaravelConfigRepo implements ConfigRepo
{

    /**
     * Get the specified configuration value.
     *
     * @param  string $key
     * @param  mixed $default
     * @return array
     */
    public function get($key, $default = null)
    {
        return config($key);
    }
}