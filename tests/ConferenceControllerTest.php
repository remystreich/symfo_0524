<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConferenceControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        static::assertResponseIsSuccessful();
        static::assertSelectorTextContains('h2', 'Give your feedback!');

    }

    public function testConferencePage() : void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        static::assertCount(2, $crawler->filter('h4'));
        $client->clickLink('View');
        static::assertPageTitleContains('Amsterdam');
        static::assertResponseIsSuccessful();
        static::assertSelectorTextContains('h2', 'Amsterdam 2019');
        static::assertSelectorExists('div:contains("There are 1 comments")');

    }
}
