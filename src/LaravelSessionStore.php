<?php


namespace Jleon\LaravelPnotify;


use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore
{
    /**
     * @var Store
     */
    private $session;

    /**
     * LaravelSessionStore constructor.
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($name, $data)
    {
        $this->session->flash($name, $data);
    }
}