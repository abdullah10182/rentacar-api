<?php namespace Triangon\Vuerentacar\Classes;
use Event;
use BackendAuth;
use Lang;
use Redirect;
class UserExtender
{
    public static function boot()
    {
        // Extend all backend form usage
        Event::listen('cms.page.init', function() {
            $user = BackendAuth::getUser();
            //dump($user->first_name);
            if(!$user)
                return Redirect::to('/backend');
        });
    }
}