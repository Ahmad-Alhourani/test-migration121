<?php
namespace App\Listeners\Backend;

/**
 * Class BranchEventListener.
 */
/**
 * Class BranchCreated.
 */
class BranchEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Branch Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Branch  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Branch Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Branch\BranchCreated::class,
            'App\Listeners\Backend\BranchEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Branch\BranchUpdated::class,
            'App\Listeners\Backend\BranchEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Branch\BranchDeleted::class,
            'App\Listeners\Backend\BranchEventListener@onDeleted'
        );
    }
}
