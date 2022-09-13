<?php


use PHPUnit\Framework\TestCase;

require_once('json_worker.php');

class json_workerTest extends TestCase
{
    public function test_get_users()
    {
        $json = json_worker::get_users();
        $this->assertSame(10, count($json));
    }
    public function test_get_users_posts()
    {
        $json = json_worker::get_users_posts(1);
        $this->assertSame(10, count($json));
    }
    public function test_get_users_todos()
    {
        $json = json_worker::get_users_todos(1);
        $this->assertSame(20, count($json));
    }
    public function test_add_post()
    {
        $json = json_worker::add_post(1,"aaa","bbb");
        $this->assertSame("aaa", $json->title);
    }
    public function test_delete_post()
    {
        $httpCode = json_worker::delete_post(1);
        $this->assertSame(200, $httpCode);
    }
    public function test_edit_post()
    {
        $json = json_worker::edit_post(1,1,"ccc","ddd");
        $this->assertSame("ccc", $json->title);
    }
}
