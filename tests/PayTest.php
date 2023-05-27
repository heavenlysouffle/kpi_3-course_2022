<?php

namespace Tests\Feature;
use Tests\TestCase;

class PayTest extends TestCase
{
    /**
     * A basic pay post method test.
     *
     * @return void
     */
    public function test_post_pay()
    {
        $response = $this->post('/pay/check', [
            'card' => '1234123412341234',
            'first_name' => 'name',
            'second_name' => 'sec_name',
        ]);

        // correct redirect means that post method works.
        $response->assertRedirect('/');
    }

    /**
     * A basic session pay page test.
     *
     * @return void
     */
    public function test_session_pay() {

        $response = $this->withSession(['order_array' => []])->post('/pay/check', [
            'card' => '1234123412341234',
            'first_name' => 'name',
            'second_name' => 'sec_name',
        ]);

        $response->assertSessionHas('order_array');
    }

    /**
     * A basic pay get method test.
     *
     * @return void
     */
    public function test_get_pay() {

        $response = $this->get('/pay');

        $response->assertStatus(200);
    }

    /**
     * A basic page /pay/check form validation test.
     *
     * @return void
     */
    public function test_pay_check_validation() {

        $response = $this->post('/pay/check', [
            // post parameter with valid data error
            'card' => '123412341234123',
            'first_name' => 'name',
            'second_name' => 'sec_name',
        ]);

        // card should be 16 nums len, we give 15 nums,
        // so no redirect will be given, and we will get page reload with error msg.
        // we check it by checking responce status.
        $response->assertStatus(200);
    }
}
