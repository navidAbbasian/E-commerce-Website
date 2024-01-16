<?php

namespace App\Containers\AppSection\ShoppingList\Listeners;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShoppingListCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShoppingListCreatedEvent $event): void
    {
        //
    }
}
