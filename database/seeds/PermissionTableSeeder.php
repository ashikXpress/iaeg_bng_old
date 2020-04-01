<?php



use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;



class PermissionTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {
        // php artisan db:seed --class=PermissionTableSeeder
        //php artisan permission:create-permission "edit-articles"

        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'about',

            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',

            'gallery-list',
            'gallery-create',
            'gallery-edit',
            'gallery-delete',

            'news-list',
            'news-create',
            'news-edit',
            'news-delete',

            'event-list',
            'event-create',
            'event-edit',
            'event-delete',

            'event-list',
            'event-create',
            'event-edit',
            'event-delete',

            'event-approved-list',
            'event-unapproved-list',

            'member-approved-list',
            'member-unapproved-list',

            'contact-mail-manage',

            'social-links',



        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);

        }

    }

}
