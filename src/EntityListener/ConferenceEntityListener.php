<?php

namespace App\EntityListener;

use Doctrine\ORM\Events;
use App\Entity\Conference;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;

#[AsEntityListener(event: Events::prePersist, entity: Conference::class)]
#[AsEntityListener(event: Events::preUpdate, entity: Conference::class)]
class ConferenceEntityListener
{
    public function __construct(private SluggerInterface $slugger) { }
    
    public function __invoke(Conference $conference, LifecycleEventArgs $event)
    {
        $conference->computeSlug($this->slugger);
    }
}