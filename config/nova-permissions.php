<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'user_model' => 'App\Models\User',

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'user_resource' => 'App\Nova\User',

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'role_resource_group' => 'Accounts',

    /*
    |--------------------------------------------------------------------------
    | Database table names
    |--------------------------------------------------------------------------
    | When using the "HasRoles" trait from this package, we need to know which
    | table should be used to retrieve your roles. We have chosen a basic
    | default value but you may easily change it to any table you like.
    */

    'table_names' => [
        'roles' => 'roles',

        'role_permission' => 'role_permission',

        'role_user' => 'role_user',

        'users' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */

    'permissions' => [
        // User

        'navigate user' => [
            'display_name' => 'Show navigation menu item',
            'description' => 'Show navigation menu item',
            'group' => 'User',
        ],

        'view user' => [
            'display_name' => 'View any user account',
            'description' => 'Can view any user account',
            'group' => 'User',
        ],

        'create user' => [
            'display_name' => 'Create a new user account',
            'description' => 'Can create a new user account',
            'group' => 'User',
        ],

        'edit user' => [
            'display_name' => 'Edit any user account',
            'description' => 'Can edit any user account',
            'group' => 'User',
        ],

        'delete user' => [
            'display_name' => 'Delete any user account',
            'description' => 'Can delete any user account',
            'group' => 'User',
        ],

        // Role

        'view role' => [
            'display_name' => 'View any role',
            'description' => 'Can view any role',
            'group' => 'Role',
        ],

        'create role' => [
            'display_name' => 'Create a new role',
            'description' => 'Can create a new role',
            'group' => 'Role',
        ],

        'edit role' => [
            'display_name' => 'Edit any role',
            'description' => 'Can edit any role',
            'group' => 'Role',
        ],

        'delete role' => [
            'display_name' => 'Delete any role',
            'description' => 'Can delete any role',
            'group' => 'Role',
        ],

        // Organization

        'view organization' => [
            'display_name' => 'View any organization',
            'description' => 'Can view any organization',
            'group' => 'Organization',
        ],

        'create organization' => [
            'display_name' => 'Create a new organization',
            'description' => 'Can create a new organization',
            'group' => 'Organization',
        ],

        'edit organization' => [
            'display_name' => 'Edit any organization',
            'description' => 'Can edit any organization',
            'group' => 'Organization',
        ],

        'delete organization' => [
            'display_name' => 'Delete any organization',
            'description' => 'Can delete any organization',
            'group' => 'Organization',
        ],

        // Department

        'view department' => [
            'display_name' => 'View any department',
            'description' => 'Can view any department',
            'group' => 'Department',
        ],

        'create department' => [
            'display_name' => 'Create a new department',
            'description' => 'Can create a new department',
            'group' => 'Department',
        ],

        'edit department' => [
            'display_name' => 'Edit any department',
            'description' => 'Can edit any department',
            'group' => 'Department',
        ],

        'delete department' => [
            'display_name' => 'Delete any department',
            'description' => 'Can delete any department',
            'group' => 'Department',
        ],

        // Courses

        'view course' => [
            'display_name' => 'View any course',
            'description' => 'Can view any course',
            'group' => 'course',
        ],

        'create course' => [
            'display_name' => 'Create a new course',
            'description' => 'Can create a new course',
            'group' => 'course',
        ],

        'edit course' => [
            'display_name' => 'Edit any course',
            'description' => 'Can edit any course',
            'group' => 'course',
        ],

        'delete course' => [
            'display_name' => 'Delete any course',
            'description' => 'Can delete any course',
            'group' => 'course',
        ],

        //Zoom meeting

        'view zoom meeting' => [
            'display_name' => 'View any zoom meeting',
            'description' => 'Can view any zoom meeting',
            'group' => 'Zoom meeting',
        ],

        'create zoom meeting' => [
            'display_name' => 'Create a new zoom meeting',
            'description' => 'Can create a new zoom meeting',
            'group' => 'Zoom meeting',
        ],

        'edit zoom meeting' => [
            'display_name' => 'Edit any zoom meeting',
            'description' => 'Can edit any zoom meeting',
            'group' => 'Zoom meeting',
        ],

        'delete zoom meeting' => [
            'display_name' => 'Delete any zoom meeting',
            'description' => 'Can delete any zoom meeting',
            'group' => 'Zoom meeting',
        ],

        //Content
        'view content' => [
            'display_name' => 'View any content',
            'description' => 'Can view any content',
            'group' => 'content',
        ],

        'create content' => [
            'display_name' => 'Create a new content',
            'description' => 'Can create a new content',
            'group' => 'content',
        ],

        'edit content' => [
            'display_name' => 'Edit any content',
            'description' => 'Can edit any content',
            'group' => 'content',
        ],

        'delete content' => [
            'display_name' => 'Delete any content',
            'description' => 'Can delete any content',
            'group' => 'content',
        ],

        //Quiz

        'view quiz' => [
            'display_name' => 'View any quiz',
            'description' => 'Can view any quiz',
            'group' => 'quiz',
        ],

        'create quiz' => [
            'display_name' => 'Create a new quiz',
            'description' => 'Can create a new quiz',
            'group' => 'quiz',
        ],

        'edit quiz' => [
            'display_name' => 'Edit any quiz',
            'description' => 'Can edit any quiz',
            'group' => 'quiz',
        ],

        'delete quiz' => [
            'display_name' => 'Delete any quiz',
            'description' => 'Can delete any quiz',
            'group' => 'quiz',
        ],

        //Question

        'view question' => [
            'display_name' => 'View any question',
            'description' => 'Can view any question',
            'group' => 'question',
        ],

        'create question' => [
            'display_name' => 'Create a new question',
            'description' => 'Can create a new question',
            'group' => 'question',
        ],

        'edit question' => [
            'display_name' => 'Edit any question',
            'description' => 'Can edit any question',
            'group' => 'question',
        ],

        'delete question' => [
            'display_name' => 'Delete any question',
            'description' => 'Can delete any question',
            'group' => 'question',
        ],

        //Progress

        'view progress' => [
            'display_name' => 'View any progress',
            'description' => 'Can view any progress',
            'group' => 'progress',
        ],

        'create progress' => [
            'display_name' => 'Create a new progress',
            'description' => 'Can create a new progress',
            'group' => 'progress',
        ],

        'edit progress' => [
            'display_name' => 'Edit any progress',
            'description' => 'Can edit any progress',
            'group' => 'progress',
        ],

        'delete progress' => [
            'display_name' => 'Delete any progress',
            'description' => 'Can delete any progress',
            'group' => 'progress',
        ],
    ],
];
