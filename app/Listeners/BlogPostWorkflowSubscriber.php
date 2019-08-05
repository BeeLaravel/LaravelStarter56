<?php
namespace App\Listeners;

use Brexis\LaravelWorkflow\Events\GuardEvent;

class PostWorkflowSubscriber {
    public function onGuard(GuardEvent $event) {
        $originalEvent = $event->getOriginalEvent();
        $post = $originalEvent->getSubject();

        if ( empty($post->title) ) $originalEvent->setBlocked(true);
    }
    public function onLeave($event) {}
    public function onTransition($event) {}
    public function onEnter($event) {}
    public function onEntered($event) {}

    public function subscribe($events) {
        $events->listen(
            'Brexis\LaravelWorkflow\Events\GuardEvent',
            'App\Listeners\PostWorkflowSubscriber@onGuard'
        );
        $events->listen(
            'Brexis\LaravelWorkflow\Events\LeaveEvent',
            'App\Listeners\PostWorkflowSubscriber@onLeave'
        );
        $events->listen(
            'Brexis\LaravelWorkflow\Events\TransitionEvent',
            'App\Listeners\PostWorkflowSubscriber@onTransition'
        );
        $events->listen(
            'Brexis\LaravelWorkflow\Events\EnterEvent',
            'App\Listeners\PostWorkflowSubscriber@onEnter'
        );
        $events->listen(
            'Brexis\LaravelWorkflow\Events\EnteredEvent',
            'App\Listeners\PostWorkflowSubscriber@onEntered'
        );
    }
}
