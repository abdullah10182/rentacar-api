<?php namespace Triangon\Vuerentacar;

use System\Classes\PluginBase;

//import class
use Triangon\Vuerentacar\Classes\UserExtender;


class Plugin extends PluginBase
{
    public function registerMarkupTags()
    {
       // dump('register');
    }

    public function boot()
    {
        UserExtender::boot();
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
