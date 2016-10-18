<?php

use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * @see User
 */
class UserListener
{
    public function preUpdate(User $user, PreUpdateEventArgs $event)
    {
        // Do something on pre update.
    }
}
