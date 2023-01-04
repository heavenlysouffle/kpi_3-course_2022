<?php

namespace Tests\Feature;

use App\Models\Panel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCartTest extends TestCase
{
//    /**
//     * A basic cart add post method test.
//     *
//     * @return void
//     */
//    public function test_post_cart_add()
//    {
//        $response = $this->post('/issues/add', [
//            'name' => '2',
//            'price' => '329',
//            'pageName' => 'selected_issues/2',
//        ]);
//
//        $response->assertRedirect('issues/selected_issue/2');
//    }
//
//    /**
//     * A basic cart remove post method test.
//     *
//     * @return void
//     */
//    public function test_post_cart_remove()
//    {
//
//        $response = $this->post('/issues/remove', [
//            'name' => '2',
//            'price' => '329',
//            'pageName' => 'selected_issues/2',
//        ]);
//
//        $response->assertRedirect('issues/selected_issue/2');
//    }
//
//    /**
//     * A basic cart delete post method test.
//     *
//     * @return void
//     */
//    public function test_post_cart_delete()
//    {
//
//        $response = $this->post('/issues/delete', [
//            'pageName' => 'selected_issues/2',
//        ]);
//
//        $response->assertRedirect('issues/selected_issue/2');
//    }

    /**
     * A basic cart pager technology post method test.
     *
     * @return void
     */
    public function test_post_cart_pager_index()
    {

        $response = $this->post('/issues/delete', [
            'pageName' => 'index',
        ]);

        $response->assertRedirect('/');
    }

    /**
     * A basic cart pager technology post method test.
     *
     * @return void
     */
    public function test_post_cart_pager_about()
    {

        $response = $this->post('/issues/delete', [
            'pageName' => 'about',
        ]);

        $response->assertRedirect('/about');
    }

    /**
     * A basic cart pager technology post method test.
     *
     * @return void
     */
    public function test_post_cart_pager_events()
    {

        $response = $this->post('/issues/delete', [
            'pageName' => 'events',
        ]);

        $response->assertRedirect('/events');
    }

    /**
     * A basic cart pager technology post method test.
     *
     * @return void
     */
    public function test_post_cart_pager_pay()
    {

        $response = $this->post('/issues/delete', [
            'pageName' => 'pay',
        ]);

        $response->assertRedirect('/pay');
    }

    /**
     * A basic cart pager technology post method test.
     *
     * @return void
     */
    public function test_post_cart_pager_issues()
    {

        $response = $this->post('/issues/delete', [
            'pageName' => 'issues',
        ]);

        $response->assertRedirect('/issues');
    }
}
