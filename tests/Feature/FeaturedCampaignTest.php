<?php

namespace Tests\Feature;

use App\Models\Campaign;
use App\Models\User;
use Database\Seeders\FeaturedCampaignSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeaturedCampaignTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(FeaturedCampaignSeeder::class);
    }

    public function test_homepage_renders_featured_campaigns_section(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');

        $response->assertStatus(200);
        $response->assertSee('FEATURED CAMPAIGN');
        $response->assertSee('Featured Campaigns');
        $response->assertSee('Free Health Check-up Camp for Rural Families');
        $response->assertSee('58,000');
        $response->assertSee('80,000');
        $response->assertSee('72.5%');
    }

    public function test_campaign_calculates_progress_correctly(): void
    {
        $campaign = Campaign::where('slug', 'free-health-checkup-camp-for-rural-families')->first();
        $this->assertNotNull($campaign);
        $this->assertEquals(80000, $campaign->target_amount);
        $this->assertEquals(58000, $campaign->raised_amount);
        $this->assertEquals(72.5, $campaign->progress_percentage);
        $this->assertCount(4, $campaign->impacts);
    }

    public function test_campaigns_index_page_loads(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/campaigns');

        $response->assertStatus(200);
        $response->assertSee('Featured Campaigns');
        $response->assertSee('Free Health Check-up Camp for Rural Families');
        $response->assertSee('Support Assistive Care for Persons with Disabilities');
    }

    public function test_campaign_show_page_loads(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/campaigns/free-health-checkup-camp-for-rural-families');

        $response->assertStatus(200);
        $response->assertSee('Free Health Check-up Camp for Rural Families');
        $response->assertSee('Tax Exemption Benefit under Section 80G');
        $response->assertSee('58,000');
        $response->assertSee('80,000');
    }

    public function test_admin_can_access_campaigns_index(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->withSession(['locale' => 'en'])->get('/admin/campaigns');
        $response->assertStatus(200);
        $response->assertSee('Featured Campaigns');
        $response->assertSee('Free Health Check-up Camp for Rural Families');
    }
}
