<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Benjamin Manguet
 */
class CoreDefaultControllerTest extends WebTestCase
{
    /**
     * @var null|KernelBrowser
     */
    protected $client;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->client = static::createClient();
    }

    /**
     * @return void
     */
    public function testIndexWithoutLocale(): void
    {
        $this->client->request('GET', '/');

        self::assertEquals(
            302,
            $this->client->getResponse()->getStatusCode()
        );
    }

    /**
     * @return void
     */
    public function testIndexWithFr(): void
    {
        $this->client->request('GET', '/fr/');

        self::assertEquals(
            200,
            $this->client->getResponse()->getStatusCode()
        );
    }

    /**
     * @return void
     */
    public function testIndexWithEn(): void
    {
        $this->client->request('GET', '/en/');

        self::assertEquals(
            200,
            $this->client->getResponse()->getStatusCode()
        );
    }
}