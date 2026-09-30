<?php

namespace Tests\Feature;

use App\Models\DonationCase;
use App\Models\User;
use Database\Seeders\DonationCaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DonationCaseTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DonationCaseSeeder::class);
    }

    public function test_homepage_renders_help_us_now_section(): void
    {
        app()->setLocale('en');
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('help-us-now');
        $response->assertSee('Recent Cases');
        $response->assertSee('Baby of Shaikh Irfan Moinuddin (Girl)');
        $response->assertSee('Treatment Expense');
        $response->assertSee('2,80,000');
    }

    public function test_homepage_calculates_case_progress(): void
    {
        $case = DonationCase::where('slug', 'baby-of-shaikh-irfan-moinuddin')->first();
        $this->assertNotNull($case);
        $this->assertEquals(280000, $case->target_amount);
        $this->assertEquals(165000, $case->collected_amount);
        $this->assertEquals(58.9, $case->progress_percentage);
    }

    public function test_donate_page_prefills_selected_case(): void
    {
        app()->setLocale('en');
        $response = $this->get('/donate?case=baby-of-shaikh-irfan-moinuddin');

        $response->assertStatus(200);
        $response->assertSee('Baby of Shaikh Irfan Moinuddin (Girl)');
        $response->assertSee('donation_case_id');
    }

    public function test_admin_can_access_donation_cases_index(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get('/admin/donation-cases');
        $response->assertStatus(200);
        $response->assertSee('Help Us Now');
        $response->assertSee('Baby of Shaikh Irfan Moinuddin');
    }
}
