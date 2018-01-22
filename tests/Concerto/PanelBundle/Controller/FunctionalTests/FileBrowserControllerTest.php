<?php

namespace Concerto\PanelBundle\Tests\Controller\FunctionalTests;

use Concerto\PanelBundle\Tests\AFunctionalTest;

class FileBrowserControllerTest extends AFunctionalTest {

    public function testFileListAction() {
        $client = self::createLoggedClient();

        $client->request('GET', '/admin/file/list');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertTrue($client->getResponse()->headers->contains("Content-Type", 'application/json'));
        $result = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey("result", $result);
        $this->assertEquals(0, $result["result"]);
        $this->assertArrayHasKey("files", $result);
        $this->assertCount(0, $result["files"]);
    }

}