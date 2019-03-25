<?php

/**
 * Company Management
 * All route names are prefixed with 'admin.company'.
 */
Route::group(
    [
        'namespace' => 'Company',
        'middleware' => 'role:administrator'
    ],
    function () {
        /*
         * Company CRUD
         */
        Route::resource('company', 'CompanyController');
    }
);
