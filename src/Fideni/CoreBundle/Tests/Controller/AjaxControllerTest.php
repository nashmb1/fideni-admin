<?php

namespace Fideni\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AjaxControllerTest extends WebTestCase
{
    public function testProjects()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/projects');
    }

}
