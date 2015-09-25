<?php


namespace Jleon\LaravelPnotify;


class Notifier
{
    /**
     * @var SessionStore
     */
    private $session;

    private $config = [];

    /**
     * @var ConfigRepo
     */
    private $configRepo;

    /**
     * Notifier constructor.
     * @param SessionStore $session
     * @param ConfigRepo $configRepo
     */
    public function __construct(SessionStore $session, ConfigRepo $configRepo)
    {
        $this->configRepo = $configRepo;
        $this->session = $session;
        $this->setDefaultConfig();

    }

    /**
     * Default message
     *
     * @param $text
     * @param bool|string $title
     * @param string $type
     */
    public function message($text, $title = false, $type = 'info')
    {
        $this->config['text'] = $text;
        $this->config['title'] = $title;
        $this->config['type'] = $type;
        $this->flashConfig();
    }

    /**
     * Success message
     *
     * @param $text
     * @param $title
     * @return $this
     */
    public function success($text, $title = false)
    {
        $this->message($text, $title, 'success');

        return $this;
    }

    /**
     * Info message
     *
     * @param $text
     * @param $title
     * @return $this
     */
    public function info($text, $title = false)
    {
        $this->message($text, $title, 'info');

        return $this;
    }

    /**
     * Warning message
     *
     * @param $text
     * @param $title
     * @return $this
     */
    public function warning($text, $title = false)
    {
        $this->message($text, $title, 'notice');

        return $this;
    }

    /**
     * Danger message
     *
     * @param $text
     * @param $title
     * @return $this
     */
    public function danger($text, $title = false)
    {
        $this->message($text, $title, 'error');

        return $this;
    }

    /**
     * Error message. Same as danger
     *
     * @param $text
     * @param $title
     * @return $this
     */
    public function error($text, $title = false)
    {
        $this->message($text, $title, 'error');

        return $this;
    }

    /**
     * Dark message
     *
     * @param $text
     * @param $title
     * @return $this
     */
    public function dark($text, $title = false)
    {
        $this->message($text, $title, 'dark');

        return $this;
    }

    /**
     * Sticky message
     *
     * @return $this
     */
    public function sticky()
    {
        $this->config['hide'] = false;
        $this->flashConfig();

        return $this;
    }

    /**
     * Set the styling: bootstrap2, bootstrap3, jqueryui or fontawesome (for bootstrap3)
     * @param string $style
     * @return $this
     */
    public function styling($style = 'bootstrap3')
    {
        $this->config['styling'] = $style;
        $this->flashConfig();

        return $this;
    }

    /**
     * Override the default config value.
     *
     * @param array $configs
     * @return $this
     */
    public function override(array $configs)
    {
        foreach($configs as $key => $value){
            $this->config[$key] = $value;
        }

        $this->flashConfig();

        return $this;
    }


    /**
     * Flash the configuration to the session
     */
    private function flashConfig()
    {

        foreach ($this->config as $key => $value) {
            $this->session->flash("notifier.{$key}", $value);
        }

        $this->session->flash('notifier.notice', $this->buildConfig());
    }

    /**
     * Generate the configuration for json
     *
     * @return string
     */
    private function buildConfig()
    {
        if (! $this->hasTitle()) {
            $this->switchTitle();
        }

        return json_encode($this->config);
    }

    /**
     * Set the default config values
     */
    private function setDefaultConfig()
    {
        $defaults = $this->configRepo->get('laravelPnotify');

        foreach($defaults as $key => $value){
            $this->config[$key] = $value;
        }
    }

    /**
     * Switch the text message to the title key
     *
     * @return string
     */
    private function switchTitle()
    {
        $this->config['title'] = $this->config['text'];
        unset($this->config['text']);
    }

    /**
     * Check if has title
     * @return bool
     */
    private function hasTitle()
    {
        return $this->config['title'] != false;
    }

}