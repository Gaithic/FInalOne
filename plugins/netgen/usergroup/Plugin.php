<?php namespace Netgen\Usergroup;

use Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot(){
        Event::listen('rainlab.user.activate', function($user) {
            $group = \Rainlab\User\Models\UserGroup::where('code', 'registered')->first();
            $user->groups()->add($group);
            $user->save();
        });
    }
}
