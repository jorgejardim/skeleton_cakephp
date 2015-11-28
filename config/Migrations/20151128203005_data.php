<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;

class Data extends AbstractMigration
{
    public function change()
    {
        // Roles Data
        $RolesTable = TableRegistry::get('Roles');
        $data = [
            [
                'id'          => '1',
                'role'        => 'root',
                'name'        => 'Root',
                'permissions' => '["Roles\/edit","Roles\/delete","Roles\/add","Roles\/index","Users\/edit","Users\/delete","Users\/add","Users\/index","Users\/view"]'
            ],
            [
                'id'          => '2',
                'role'        => 'master',
                'name'        => 'Master',
                'permissions' => '["Roles\/edit","Roles\/delete","Roles\/add","Roles\/index","Users\/edit","Users\/delete","Users\/add","Users\/index","Users\/view"]'
            ],
            [
                'id'          => '3',
                'role'        => 'administrador',
                'name'        => 'Administrador',
                'permissions' => '["Roles\/edit","Roles\/delete","Roles\/add","Roles\/index","Users\/edit","Users\/delete","Users\/add","Users\/index","Users\/view"]'
            ],
            [
                'id'          => '4',
                'role'        => 'usuario',
                'name'        => 'Usuário',
                'permissions' => '["none"]'
            ],
        ];
        $roles = $RolesTable->newEntities($data);
        foreach ($roles as $role) {
            $RolesTable->save($role);
        }
        // debug($roles);

        // Users Data
        $UsersTable = TableRegistry::get('Users');
        $data = [
            [
                'id'       => '1',
                'role_id'  => '1',
                'name'     => 'Jorge Jardim',
                'email'    => 'jorge@jorgejardim.com.br',
                'password' => '123456',
                'birth'    => '24/11/1980',
                'locale'   => 'pt_BR',
                'avatar'   => '0',
                'status'   => '1'
            ],
        ];
        $users = $UsersTable->newEntities($data);
        foreach ($users as $user) {
            $UsersTable->save($user);
        }
        // debug($users);
    }
}