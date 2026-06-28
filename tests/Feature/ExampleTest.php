<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_dashboard_card_component_serializes_data_prop_to_data_attribute(): void
    {
        $view = $this->blade('<x-dashboard.card :data="$plan" />', [
            'plan' => ['name' => 'Plano Básico', 'price' => 90],
        ]);

        $view->assertSee('"name":"Plano Básico"', false);
    }
}
