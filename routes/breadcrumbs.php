<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
//     $trail->push('Dashboard', route('home.index'));
// });

// Breadcrumbs::for('subcategories', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('SubCategories', route('sub_categories.index'));
// });

/*------------- Admin Dashboard (Admin Home) -------------*/
// Home
Breadcrumbs::for('home.index', function ($trail) {
    $trail->push('Dashboard', route('home.index'));
});

Breadcrumbs::macro('resource', function ($name, $title, $list = false) {
    // Home > $title
    Breadcrumbs::for("$name.index", function ($trail) use ($name, $title) {
        $trail->parent("home.index");
        $trail->push($title, route("$name.index"));
    });
    // Home > $title > Add New
    Breadcrumbs::for("$name.create", function ($trail) use ($name, $title) {
        $trail->parent("$name.index");
        $trail->push("Add New $title", route("$name.create"));
    });
    // Home > $title > Edit
    Breadcrumbs::for("$name.edit", function ($trail) use ($name, $title) {
        $trail->parent("$name.index");
        $trail->push("Edit $title", url("admin/$name/{id}/edit"));
    });
    // Home > $title > Details
    Breadcrumbs::for("$name.show", function ($trail) use ($name, $title) {
        $trail->parent("$name.index");
        $trail->push(" Details", url("admin/$name/{id}"));
    });
    if ($list == true) {
        Breadcrumbs::for("$name.list", function ($trail) use ($name, $title) {
            $trail->parent("admin.dashboard");
            $trail->push($title, route("$name.list"));
        });
    }
});

/*------------- Admin Users ------------------------*/
Breadcrumbs::resource('users', 'Users');
/*------------- Admin Roles ------------------------*/
Breadcrumbs::resource('roles', 'Roles');
/*------------- Admin Permissions ------------------------*/
Breadcrumbs::resource('permissions', 'Permissions');
/*------------- Admin Categories ------------------------*/
Breadcrumbs::resource('categories', 'Categories');
/*------------- Admin Sub Categories ------------------------*/
Breadcrumbs::resource('sub_categories', 'Sub Categories');
