<?php
namespace App\Listeners\Backend;

/**
 * Class CompanyEventListener.
 */
/**
 * Class CompanyCreated.
 */
class CompanyEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Company Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Company  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Company Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Company\CompanyCreated::class,
            'App\Listeners\Backend\CompanyEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Company\CompanyUpdated::class,
            'App\Listeners\Backend\CompanyEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Company\CompanyDeleted::class,
            'App\Listeners\Backend\CompanyEventListener@onDeleted'
        );
    }
}
