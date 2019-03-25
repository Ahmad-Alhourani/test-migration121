<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(
        __('strings.backend.dashboard.title'),
        route('admin.dashboard')
    );
});

//start_Company_start
Breadcrumbs::register('admin.company.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(
        __('strings.backend.companies.title'),
        route('admin.company.index')
    );
});

Breadcrumbs::register('admin.company.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.company.index');
    $breadcrumbs->push(
        __('labels.backend.companies.create'),
        route('admin.company.create')
    );
});

Breadcrumbs::register('admin.company.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.company.index');
    $breadcrumbs->push(
        __('menus.backend.companies.view'),
        route('admin.company.show', $id)
    );
});

Breadcrumbs::register('admin.company.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.company.index');
    $breadcrumbs->push(
        __('menus.backend.companies.edit'),
        route('admin.company.edit', $id)
    );
});
//end_Company_end

//*****Do Not Delete Me

require __DIR__ . '/auth.php';
require __DIR__ . '/log-viewer.php';
