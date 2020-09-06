<?php namespace Triangon\Profile;

use Rainlab\User\Controllers\Users as UsersController;
use Rainlab\User\Models\User as UserModel;

use System\Classes\PluginBase;

use Event;
use Rainlab\User\Models\UserGroup;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot(){

        UserModel::extend(function ($model){
            $model->addFillable([
                'facebook',
                'bio'
            ]);
        });

        Event::listen('rainlab.user.activate', function($user) {
            $group = \Rainlab\User\Models\UserGroup::where('code', 'guest')->first();
            $user->groups()->add($group);
            $user->save(); 
        });

        UsersController::extendFormFields(function($form, $model, $context){
            $form->addTabFields([
                'facebook' => [
                    'label' => 'Facebook',
                    'type' => 'text',
                    'tab' => 'Profile'
                ],
                'bio' => [
                    'label' => 'Biography',
                    'type' => 'textarea',
                    'tab' => 'Profile'
                ]
            ]);
        });

    }
}
