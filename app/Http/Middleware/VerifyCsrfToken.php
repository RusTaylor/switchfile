<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/api/get/courses',
        '/api/get/lessons',
        'panel/api/getAllGroups',
        'panel/api/getCourses',
        'panel/api/getLessons',
        'panel/api/getFileData',
        'panel/api/saveFileChanges',
        'panel/api/getFiles',
        'panel/api/saveThemeChanges',
        'panel/api/deleteFile',
        'panel/api/deleteTheme'
    ];
}
