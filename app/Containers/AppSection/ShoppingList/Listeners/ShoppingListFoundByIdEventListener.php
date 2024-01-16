<?php

namespace App\Containers\AppSection\ShoppingList\Listeners;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShoppingListFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ShoppingListFoundByIdEvent $event): void
    {
        //
    }
}
