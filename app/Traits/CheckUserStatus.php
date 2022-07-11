<?php


namespace App\Traits;


trait CheckUserStatus
{
    // status = (1) isActive (2) isExpired (3) isTerminated

    public function isActive (): bool
    {
        return $this->statusCheck(1);
    }

    public function isExpired (): bool
    {
        return $this->statusCheck(2);
    }

    public function isTerminated (): bool
    {
        return $this->statusCheck(3);
    }

    protected function statusCheck ($status = 1): bool
    {
        if ($this->hasRole(['user']))
        {
            return $this->status == $status;
        }

        return false;
    }
}
