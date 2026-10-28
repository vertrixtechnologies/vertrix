<?php

namespace Tests\Feature;

use App\Models\Assessment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssessmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the homepage renders with Vertrix branding and key sections.
     */
    public function test_homepage_contains_vertrix_branding(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Vertrix');
        $response->assertSee('Your business, moving.');
        $response->assertSee('Your technology, handled.');
        $response->assertSee('Cybersecurity');
        $response->assertSee('SaaS Development');
        $response->assertSee('Web Development');
        $response->assertSee('AI Integration');
        $response->assertSee('Cloud Architecture');
    }

    /**
     * Test submitting assessment form via JSON API (AJAX).
     */
    public function test_submitting_assessment_via_json(): void
    {
        $payload = [
            'fullName' => 'Sarah Connor',
            'workEmail' => 'sarah@skynetdefense.io',
            'companyName' => 'Cyberdyne Systems',
            'teamSize' => '51-200',
            'interestedIn' => 'cybersecurity',
            'wishlist' => 'Need full zero-trust architecture and SOC 2 readiness audit.',
            'privacyConsent' => '1',
        ];

        $response = $this->postJson('/assessment', $payload);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => 'Sarah Connor',
                ],
            ]);

        $this->assertDatabaseHas('assessments', [
            'full_name' => 'Sarah Connor',
            'work_email' => 'sarah@skynetdefense.io',
            'company_name' => 'Cyberdyne Systems',
            'team_size' => '51-200',
            'interested_in' => 'cybersecurity',
        ]);
    }

    /**
     * Test submitting assessment form via standard HTML POST.
     */
    public function test_submitting_assessment_via_web_form_redirects_with_flash(): void
    {
        $payload = [
            'fullName' => 'Alex Murphy',
            'workEmail' => 'murphy@omnicorp.com',
            'companyName' => 'Omni Consumer Products',
            'teamSize' => '200+',
            'interestedIn' => 'complete',
            'wishlist' => 'Looking for 24/7 dedicated SOC support.',
            'privacyConsent' => '1',
        ];

        $response = $this->post('/assessment', $payload);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('assessments', [
            'full_name' => 'Alex Murphy',
            'work_email' => 'murphy@omnicorp.com',
            'company_name' => 'Omni Consumer Products',
            'team_size' => '200+',
            'interested_in' => 'complete',
        ]);
    }

    /**
     * Test validation rules for required fields.
     */
    public function test_assessment_validation_fails_on_empty_input(): void
    {
        $response = $this->postJson('/assessment', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['fullName', 'workEmail', 'companyName', 'teamSize']);
    }
}
