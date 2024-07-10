<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;

class RolePolicy
{
    public function create(User $user)
    {
        // Burada rol oluşturma yetkisini kontrol edebilirsiniz
        return true; // Örneğin her zaman true döndürdüğümüzü varsayalım
    }

    public function update(User $user, Role $role)
    {
        // Burada rol güncelleme yetkisini kontrol edebilirsiniz
        return true; // Örneğin her zaman true döndürdüğümüzü varsayalım
    }

    public function delete(User $user, Role $role)
    {
        // Burada rol silme yetkisini kontrol edebilirsiniz
        return true; // Örneğin her zaman true döndürdüğümüzü varsayalım
    }
}
