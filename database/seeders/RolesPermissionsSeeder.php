<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin','user','moderator'];
        $permissions = [
            'view dashboard',
            'view users','add users','edit users','update users','delete users',
            'view categories','add categories','edit categories','update categories','delete categories',
            'view blog posts','add blog posts','edit blog posts','update blog posts','delete blog posts',
            'view courses','add courses','edit courses','update courses','delete courses',
            'view notices','add notices','edit notices','update notices','delete notices',
            'view banners','add banners','edit banners','update banners','delete banners',
            'view clients','add clients','edit clients','update clients','delete clients',
            'view testimonials','add testimonials','edit testimonials','update testimonials','delete testimonials',
            'view reviews','add reviews','edit reviews','update reviews','delete reviews',
            'view popular courses','add popular courses','edit popular courses','update popular courses','delete popular courses',
            'view roles','add roles','edit roles','update roles','delete roles',
            'view permissions',
        ];

        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user',
                'guard_name' => 'web'
            ],
            [
                'name' => 'moderator',
                'guard_name' => 'web'
            ]
        ]);

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert(['name' => $permission,'guard_name'=>'web']);
        }
    }
}
