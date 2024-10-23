<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Profile', route('profile.edit'));
});

Breadcrumbs::for('space_list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Spaces', route('space_list'));
});

Breadcrumbs::for('space', function (BreadcrumbTrail $trail, $space) {
    $trail->parent('space_list');
    $trail->push($space->name, route('space', $space->id));
});

Breadcrumbs::for('space_new', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('New Space', route('space_new'));
});

Breadcrumbs::for('space_edit', function (BreadcrumbTrail $trail, $space) {
    $trail->parent('space', $space);
    $trail->push('Edit Space', route('space_edit', $space->id));
});

Breadcrumbs::for('task_new', function (BreadcrumbTrail $trail, $space) {
    $trail->parent('space', $space);
    $trail->push('New Task', route('task_new', $space->id));
});

Breadcrumbs::for('task_edit', function (BreadcrumbTrail $trail, $space, $task) {
    $trail->parent('space', $space);
    $trail->push('Edit Task', route('task_edit', ['space_id' => $space->id, 'task_id' => $task->id]));
});