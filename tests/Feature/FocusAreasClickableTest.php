<?php

namespace Tests\Feature;

use App\Models\FocusArea;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FocusAreasClickableTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /**
     * Test that the homepage renders all 8 focus areas with correct links,
     * hover styling, and accessibility attributes.
     */
    public function test_homepage_renders_all_eight_focus_areas_as_clickable_cards()
    {
        $response = $this->withSession(['locale' => 'en'])->get(route('home'));
        $response->assertStatus(200);

        $expectedSlugs = [
            'education',
            'healthcare',
            'women-empowerment',
            'child-welfare',
            'environment',
            'skill-development',
            'rural-development',
            'social-welfare',
        ];

        foreach ($expectedSlugs as $slug) {
            $expectedUrl = route('our-work.show', $slug);
            $response->assertSee($expectedUrl, false);
        }

        // Verify hover effects and accessibility styling
        $content = $response->getContent();
        $this->assertStringContainsString('hover:-translate-y-1', $content);
        $this->assertStringContainsString('hover:shadow-md', $content);
        $this->assertStringContainsString('cursor-pointer', $content);
        $this->assertStringContainsString('focus-visible:ring-2', $content);
    }

    /**
     * Test that every one of the 8 focus area detail pages returns 200 OK
     * across English, Marathi, and Hindi locales.
     */
    public function test_all_eight_focus_area_detail_pages_return_200_in_all_locales()
    {
        $locales = ['en', 'mr', 'hi'];
        $slugs = [
            'education',
            'healthcare',
            'women-empowerment',
            'child-welfare',
            'environment',
            'skill-development',
            'rural-development',
            'social-welfare',
        ];

        foreach ($locales as $locale) {
            foreach ($slugs as $slug) {
                $response = $this->withSession(['locale' => $locale])
                    ->get(route('our-work.show', $slug));

                $response->assertStatus(200);
            }
        }
    }

    /**
     * Test that the Education detail page matches the required design elements:
     * breadcrumbs, header banner with icon, main image, Project Details section,
     * related projects, and donation/volunteer sidebar cards.
     */
    public function test_education_detail_page_matches_design_requirements()
    {
        $response = $this->withSession(['locale' => 'en'])
            ->get(route('our-work.show', 'education'));

        $response->assertStatus(200);

        // Breadcrumb and Title
        $response->assertSeeText('Our Work');
        $response->assertSeeText('Education');

        // Main sections
        $response->assertSeeText('Project Details');
        $response->assertSeeText('Projects');

        // Sidebar CTA cards
        $response->assertSeeText('Support Our Cause');
        $response->assertSeeText('Become a Volunteer');
        $response->assertSee(route('donate'), false);
        $response->assertSee(route('volunteer'), false);

        // Rich header banner and main image structure
        $content = $response->getContent();
        $this->assertStringContainsString('from-[#0D5C3A]', $content);
        $this->assertStringContainsString('<img', $content);
    }

    /**
     * Test that Marathi locale displays Marathi translations for focus area details.
     */
    public function test_marathi_focus_area_detail_page_renders_localized_content()
    {
        $response = $this->withSession(['locale' => 'mr'])
            ->get(route('our-work.show', 'education'));

        $response->assertStatus(200);
        $response->assertSeeText('आमची कार्यक्षेत्रे');
        $response->assertSeeText('शिक्षण');
        $response->assertSeeText('प्रकल्प तपशील');
    }
}
