<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/stack-test', function () {
    $spatie = [
        'status' => 'pending',
        'message' => 'Waiting for permission tables.',
        'role' => null,
        'permission' => null,
        'user' => null,
    ];

    $requiredTables = [
        'users',
        'roles',
        'permissions',
        'model_has_roles',
        'role_has_permissions',
    ];

    if (collect($requiredTables)->every(fn (string $table) => Schema::hasTable($table))) {
        try {
            $permission = Permission::query()->firstOrCreate([
                'name' => 'view stack test',
                'guard_name' => 'web',
            ], [
                'code' => 'STACK_TEST_VIEW',
                'tab' => 'demo',
                'page' => '/stack-test',
            ]);

            $role = Role::query()->firstOrCreate([
                'name' => 'stack tester',
                'guard_name' => 'web',
            ]);

            if (! $role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
            }

            $user = User::query()->firstOrCreate(
                ['email' => 'stack-test@example.com'],
                ['name' => 'Stack Tester', 'password' => 'password']
            );

            if (! $user->hasRole($role)) {
                $user->assignRole($role);
            }

            $spatie = [
                'status' => 'ok',
                'message' => 'Role, permission, and demo user were created successfully.',
                'role' => $role->name,
                'permission' => $permission->name,
                'user' => $user->email,
            ];
        } catch (\Throwable $exception) {
            $spatie = [
                'status' => 'error',
                'message' => $exception->getMessage(),
                'role' => null,
                'permission' => null,
                'user' => null,
            ];
        }
    }

    return view('welcome', [
        'stackDemo' => [
            'tailwind' => 'ok',
            'bootstrap' => 'ok',
            'spatie' => $spatie,
        ],
    ]);
});
