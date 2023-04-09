<?php namespace CodeIgniter;

use CodeIgniter\Test\ControllerTester;

class TestControllerA extends \CIDatabaseTestCase
{
    use ControllerTester;

    public function testShowCategories()
    {
        $result = $this->withURI('http://localhost:8080/signup')
                        ->controller(\App\Controllers\ForumController::class)
                        ->execute('showCategories');

        $this->assertTrue($result->isOK());
    }
}   