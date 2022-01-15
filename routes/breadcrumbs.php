<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail): void {
    $trail->push(route('dashboard'));
});

Breadcrumbs::for('list', function (BreadcrumbTrail $trail): void {
    $trail->push("Liste des villes", route('list'));
});

Breadcrumbs::for('list_offices', function (BreadcrumbTrail $trail): void {
    $trail->parent('list');

    $trail->push("Liste des Bureaux", route('list_offices'));
});

Breadcrumbs::for('list_electors', function (BreadcrumbTrail $trail): void {
    $trail->parent('list_offices');

    $trail->push("Électeurs", route('list_electors'));
});

Breadcrumbs::for('edit_elector', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('list_electors');

    $trail->push("Édition #" . $id, route('edit_elector', $id));
});
