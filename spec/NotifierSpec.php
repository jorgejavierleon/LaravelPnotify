<?php

namespace spec\Jleon\LaravelPnotify;

use Jleon\LaravelPnotify\ConfigRepo;
use Jleon\LaravelPnotify\SessionStore;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotifierSpec extends ObjectBehavior
{
    function let(SessionStore $session, ConfigRepo $configRepo)
    {
        $configRepo->get('laravelPnotify')->willReturn([

            'title' => false,
            'title_escape' => false,
            'text' => false,
            'text_escape' => false,
            'styling' => 'bootstrap3',
            'addclass' => '',
            'cornerclass' => '',
            'auto_display' => true,
            'width' => '300px',
            'min_height' => '16px',
            'type' => 'notice',
            'icon' => true,
            'animation' => 'fade',
            'animate_speed' => 'slow',
            'position_animate_speed' => 500,
            'opacity' => 1,
            'shadow' => true,
            'hide' => true,
            'delay' => 8e3,
            'mouse_reset' => true,
            'remove' => true,
            'insert_brs' => true,
        ]);
        $this->beConstructedWith($session, $configRepo);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Jleon\LaravelPnotify\Notifier');
    }

    function it_flashes_success_messages()
    {
        $this->success('mesaje')->shouldBeAnInstanceOf('Jleon\LaravelPnotify\Notifier');
    }

}
