<?php

namespace Tests\Feature;

use App\Models\Panel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Provides tests for 200 status get resources.
 */
class GetTest extends TestCase {

    /**
     * A basic index page get method test.
     */
    public function test_get_index_page() {

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic about page get method test.
     */
    public function test_get_about_page() {

        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    /**
     * A basic events page get method test.
     */
    public function test_get_events_page() {

        $response = $this->get('/events');

        $response->assertStatus(200);
    }

    /**
     * A basic issues page get method test.
     */
    public function test_get_issues_page() {

        $response = $this->get('/issues');

        $response->assertStatus(200);
    }

    /**
     * A basic selected issue page get method test.
     */
    public function test_get_issues_selected_page() {

        $response = $this->get('/issues/selected_issue/1');

        $response->assertStatus(200);
    }

//    /**
//     * A basic selected issue page get method parameter validation test.
//     */
//    public function test_get_issues_selected_parameter() {
//
//        $response = $this->get('/issues/selected_issue/999');
//
//        $response->assertStatus(404);
//    }
}
