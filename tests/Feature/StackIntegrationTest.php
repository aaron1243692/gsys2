<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StackIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_stack_test_page_loads(): void
    {
        $response = $this->get('/stack-test');

        $response->assertOk();
        $response->assertSee('Tailwind status');
        $response->assertSee('Bootstrap status');
        $response->assertSee('Spatie status');
    }

    public function test_spatie_role_and_permission_can_be_assigned(): void
    {
        $permission = Permission::query()->create([
            'name' => 'publish posts',
            'code' => 'POST_PUBLISH',
            'tab' => 'posts',
            'page' => '/posts',
            'guard_name' => 'web',
        ]);

        $role = Role::query()->create([
            'name' => 'editor',
            'guard_name' => 'web',
        ]);

        $role->givePermissionTo($permission);

        $user = User::factory()->create();
        $user->assignRole($role);

        $this->assertTrue($user->hasRole('editor'));
        $this->assertTrue($user->can('publish posts'));
    }

    public function test_role_table_is_connected_to_permission_table(): void
    {
        $permission = Permission::query()->create([
            'name' => 'view dashboard',
            'code' => 'DASHBOARD_VIEW',
            'tab' => 'dashboard',
            'page' => '/dashboard',
            'guard_name' => 'web',
        ]);

        $role = Role::query()->create([
            'name' => 'manager',
            'guard_name' => 'web',
        ]);

        $role->permissions()->attach($permission->id);

        $this->assertTrue($role->permissions->contains('id', $permission->id));
        $this->assertTrue($permission->roles->contains('id', $role->id));
    }
}
