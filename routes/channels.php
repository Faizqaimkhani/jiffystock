<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;


// Broadcast::channel('chat', function ($user) {
//     return Auth::check();
// });

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

// Broadcast::channel('users.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

// Broadcast::channel('groups.{group}', function ($user, Group $group) {
//    return $group->hasUser($user->id);
// });

Broadcast::channel('groups.{group}', function ($user) {
   return true;
});
