<?php

namespace App\Containers\AppSection\ShoppingList\Listeners;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShoppingListsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShoppingListsListedEvent $event): void
    {
        //
    }
}
