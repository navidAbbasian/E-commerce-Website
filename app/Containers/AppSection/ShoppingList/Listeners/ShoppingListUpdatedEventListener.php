<?php

namespace App\Containers\AppSection\ShoppingList\Listeners;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShoppingListUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShoppingListUpdatedEvent $event): void
    {
        //
    }
}
