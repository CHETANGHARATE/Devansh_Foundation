<?php

namespace Tests\Feature;

use App\Models\Campaign;
use App\Models\DonationCase;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UiImprovementsAndResponsiveFixesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_featured_campaigns_has_compact_layout_and_unclipped_buttons(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Compact image dimensions (h-36 sm:h-40 instead of h-44 sm:h-48)
        $this->assertStringContainsString('h-36 sm:h-40 rounded-xl overflow-hidden', $content);

        // 2-Column Button Grid for perfect alignment & equal 50% width
        $this->assertStringContainsString('grid grid-cols-2 gap-1.5 sm:gap-2 mt-2.5 pt-2.5 border-t border-gray-100', $content);

        // Both buttons present
        $this->assertStringContainsString('Donate Now →', $content);
        $this->assertStringContainsString('View Campaign Details →', $content);

        // Verify min-h-[38px] prevents vertical mismatch while wrapping cleanly
        $this->assertStringContainsString('min-h-[38px]', $content);
    }

    public function test_recent_cases_has_both_donate_and_view_details_buttons(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);

        $firstCase = DonationCase::active()->first();
        $this->assertNotNull($firstCase);

        $content = $response->getContent();

        // Compact image dimensions in recent cases
        $this->assertStringContainsString('h-36 sm:h-40 rounded-xl overflow-hidden bg-gray-100 shadow-inner', $content);

        // Recent cases has 2 buttons in grid
        $this->assertStringContainsString('grid grid-cols-2 gap-1.5 sm:gap-2 mt-2.5 pt-2.5 border-t border-[#EFEBE4]', $content);

        // View Details button exists and links to cases.show
        $this->assertStringContainsString('View Details →', $content);
        $this->assertStringContainsString(route('cases.show', $firstCase->slug), $content);
        $this->assertStringContainsString(route('donate', ['case' => $firstCase->slug]), $content);
    }

    public function test_case_details_page_renders_full_case_information(): void
    {
        $case = DonationCase::where('slug', 'demo-case-child-healthcare-support')->first();
        $this->assertNotNull($case);

        $response = $this->withSession(['locale' => 'en'])->get(route('cases.show', $case->slug));
        $response->assertStatus(200);

        // Full case title & category
        $response->assertSeeText($case->t('title') ?: $case->beneficiary_name);
        $response->assertSeeText('Demo Case');
        $response->assertSeeText('This is a sample demonstration case for UI display and system evaluation.');

        // Financial metrics
        $response->assertSeeText($case->formatted_target_amount);
        $response->assertSeeText($case->formatted_collected_amount);
        $response->assertSeeText($case->formatted_remaining_amount);

        // Back link to Recent Cases on homepage
        $response->assertSee(route('home') . '#help-us-now');
        $response->assertSeeText('Back to Recent Cases');

        // Donate Now action leading to donation page
        $response->assertSee(route('donate', ['case' => $case->slug]));
    }

    public function test_case_details_page_supports_marathi_and_hindi(): void
    {
        $case = DonationCase::where('slug', 'demo-case-child-healthcare-support')->first();
        $this->assertNotNull($case);

        // Marathi
        $responseMr = $this->withSession(['locale' => 'mr'])->get(route('cases.show', $case->slug));
        $responseMr->assertStatus(200);
        $responseMr->assertSeeText('मागील केसेसकडे परत या');
        $responseMr->assertSeeText('केसचा तपशील');
        $responseMr->assertSeeText('डेमो केस');

        // Hindi
        $responseHi = $this->withSession(['locale' => 'hi'])->get(route('cases.show', $case->slug));
        $responseHi->assertStatus(200);
        $responseHi->assertSeeText('हाल के मामलों पर वापस जाएं');
        $responseHi->assertSeeText('मामले का विवरण');
        $responseHi->assertSeeText('डेमो केस');
    }

    public function test_hero_banner_text_positioning_is_optimized(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Left-side content moved further left with max-w-[1440px] and lg:px-14 xl:px-16
        $this->assertStringContainsString('max-w-[1440px] mx-auto px-12 sm:px-10 lg:px-14 xl:px-16 py-10 lg:py-16 relative z-10 w-full', $content);

        // Right-side chalk text moved towards right edge away from subject faces
        $this->assertStringContainsString('top-6 sm:top-8 md:top-10 right-6 sm:right-10 md:right-12 lg:right-16 xl:right-20 z-10 pointer-events-none transform -rotate-2 text-right hidden md:block select-none', $content);

        // Fade effect is preserved
        $this->assertStringContainsString('transition-opacity duration-1000 ease-in-out', $content);
        $this->assertStringNotContainsString('carousel-track', $content);
    }
}
