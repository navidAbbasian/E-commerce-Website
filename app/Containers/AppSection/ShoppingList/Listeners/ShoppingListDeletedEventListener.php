<?php

namespace App\Containers\AppSection\ShoppingList\Listeners;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShoppingListDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShoppingListDeletedEvent $event): void
    {
        //
    }
}
