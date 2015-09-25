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

