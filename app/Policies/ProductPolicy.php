<?php

namespace App\Policies;

//use App\Model\user\User;
//use App\Product;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view the post.
     *
     * @param  \App\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can create posts.
     *
     * @param  \App\admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user,3);
    }

    /**
     * Determine whether the admin can update the post.
     *
     * @param  \App\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $this->getPermission($user,4);
    }

    /**
     * Determine whether the admin can delete the post.
     *
     * @param  \App\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user,5);
    }

    public function tag(Admin $user)
    {
        return $this->getPermission($user,10);
    }

    public function category(Admin $user)
    {
        return $this->getPermission($user,11);
    }
    public function permission(Admin $user)
    {
        return $this->getPermission($user,12);
    }
    public function roles(Admin $user)
    {
        return $this->getPermission($user,13);
    }
     public function users(Admin $user)
    {
        return $this->getPermission($user,14);
    }


    protected function getPermission($user,$p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
//    public function restore(User $user, Product $product)
//    {
//        //
//    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
//    public function forceDelete(User $user, Product $product)
//    {
//        //
//    }
}
