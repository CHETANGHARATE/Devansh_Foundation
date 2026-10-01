<?php

namespace Tests\Feature;

use App\Models\Campaign;
use App\Models\DonationCase;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MultiCardCarouselTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_homepage_renders_both_multi_card_carousels(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);

        // Featured Campaigns Section Checks
        $response->assertSee('featured-campaigns');
        $response->assertSee('featuredCampaignsCarousel');
        $response->assertSee('Featured Campaigns');
        $response->assertSee('Free Health Check-up Camp for Rural Families');
        $response->assertSee('Support Assistive Care for Persons with Disabilities');
        $response->assertSee('FEATURED CAMPAIGN');

        // Recent Cases Section Checks
        $response->assertSee('help-us-now');
        $response->assertSee('recentCasesCarousel');
        $response->assertSee('Recent Cases');
        $response->assertSee('Help Us Now');
        $response->assertSee('Demo Case – Child Healthcare Support');
        $response->assertSee('Treatment Expense');
    }

    public function test_carousels_contain_responsive_multi_card_classes(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);

        // Verify the 1-on-mobile, 2-on-tablet, 3-on-desktop responsive layout classes
        $content = $response->getContent();
        $this->assertStringContainsString('w-full md:w-1/2 lg:w-1/3 shrink-0', $content);
        $this->assertStringContainsString('transition-transform duration-600 ease-out', $content);
    }

    public function test_carousels_have_interaction_and_pause_attributes(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Pause on hover
        $this->assertStringContainsString('@mouseenter="pauseAutoplay()"', $content);
        $this->assertStringContainsString('@mouseleave="resumeAutoplay()"', $content);

        // Keyboard accessibility
        $this->assertStringContainsString('@keydown.right.prevent="next()"', $content);
        $this->assertStringContainsString('@keydown.left.prevent="prev()"', $content);

        // Touch swipe support
        $this->assertStringContainsString('@touchstart.passive="touchStart($event)"', $content);
        $this->assertStringContainsString('@touchend.passive="touchEnd()"', $content);
    }

    public function test_all_campaigns_and_cases_rendered_with_database_data(): void
    {
        $campaignsCount = Campaign::active()->featured()->count();
        $casesCount = DonationCase::active()->count();

        $this->assertGreaterThanOrEqual(4, $campaignsCount);
        $this->assertGreaterThanOrEqual(8, $casesCount);

        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);

        // Verify links and buttons
        $firstCampaign = Campaign::active()->featured()->first();
        $response->assertSee(route('donate', ['campaign' => $firstCampaign->slug]));
        $response->assertSee(route('campaigns.show', $firstCampaign->slug));

        $firstCase = DonationCase::active()->first();
        $response->assertSee(route('donate', ['case' => $firstCase->slug]));
    }

    public function test_carousels_support_marathi_and_hindi(): void
    {
        // Marathi
        $responseMr = $this->withSession(['locale' => 'mr'])->get('/');
        $responseMr->assertStatus(200);
        $responseMr->assertSee('विशेष मोहिमा');
        $responseMr->assertSee('आम्हाला आत्ताच मदत करा');

        // Hindi
        $responseHi = $this->withSession(['locale' => 'hi'])->get('/');
        $responseHi->assertStatus(200);
        $responseHi->assertSee('विशेष अभियान');
        $responseHi->assertSee('अभी हमारी मदद करें');
    }
}
