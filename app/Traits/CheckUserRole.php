<?php


namespace App\Traits;


trait CheckUserRole
{
    public function isAdmin()
    {
        if ($this->hasRole('admin'))
        {
            return true;
        }

        return false;
    }

    public function isReseller()
    {
        if ($this->hasRole('reseller'))
        {
            return true;
        }

        return false;
    }

    public function isUser()
    {
        if ($this->hasRole('user'))
        {
            return true;
        }

        return false;
    }
}
