<?php

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('client-chat.{userId}.project.{projectId}', function ($user, $message) {
    return true;
});
Broadcast::channel('chat', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});
// Broadcast::channel('chatroom', function ($user) {
//     return ['id'=> $user->id];
// });
