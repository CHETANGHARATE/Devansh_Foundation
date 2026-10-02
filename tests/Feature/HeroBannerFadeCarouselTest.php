<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HeroBannerFadeCarouselTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_homepage_renders_hero_fade_carousel()
    {
        $response = $this->withSession(['locale' => 'en'])->get(route('home'));
        $response->assertStatus(200);

        // Section container
        $response->assertSee('id="hero-carousel-section"', false);
        $response->assertSee('heroBannerFadeCarousel()', false);
        $response->assertSee('transition-opacity duration-1000', false);

        // 4 Banner Slides present in markup
        $response->assertSeeText('Educating Today');
        $response->assertSeeText('Empowering Tomorrow');
        $response->assertSeeText('Healthcare for');
        $response->assertSeeText('Every Life');
        $response->assertSeeText('A Cleaner Environment');
        $response->assertSeeText('for Healthier Lives');
        $response->assertSeeText('Empowering Women,');
        $response->assertSeeText('Building Futures');

        // Navigation elements
        $response->assertSee('Previous Banner');
        $response->assertSee('Next Banner');
        $response->assertSee('Go to slide 1');
        $response->assertSee('Go to slide 4');

        // Preload tags in head
        $response->assertSee('hero-slide-education.jpg');
        $response->assertSee('hero-slide-healthcare.jpg');
        $response->assertSee('hero-slide-environment.jpg');
        $response->assertSee('hero-slide-women.jpg');
    }

    public function test_hero_carousel_multilingual_marathi()
    {
        $response = $this->withSession(['locale' => 'mr'])->get(route('home'));
        $response->assertStatus(200);

        $response->assertSeeText('गुणवत्तापूर्ण शिक्षण, उज्ज्वल भविष्य');
        $response->assertSeeText('आजचे शिक्षण');
        $response->assertSeeText('उद्याचे सक्षमीकरण');
        $response->assertSeeText('निरोगी समाज, सशक्त भविष्य');
        $response->assertSeeText('प्रत्येक जीवासाठी');
        $response->assertSeeText('आरोग्य सेवा');
        $response->assertSeeText('हरित पर्यावरण, समृद्ध पिढ्या');
        $response->assertSeeText('स्वच्छ व हरित पर्यावरण');
        $response->assertSeeText('महिला सक्षमीकरण, कुटुंबाचा विकास');
        $response->assertSee('मागील बॅनर');
        $response->assertSee('पुढील बॅनर');
    }

    public function test_hero_carousel_multilingual_hindi()
    {
        $response = $this->withSession(['locale' => 'hi'])->get(route('home'));
        $response->assertStatus(200);

        $response->assertSeeText('गुणवत्तापूर्ण शिक्षा, उज्ज्वल भविष्य');
        $response->assertSeeText('आज की शिक्षा');
        $response->assertSeeText('कल का सशक्तिकरण');
        $response->assertSeeText('स्वस्थ समाज, सशक्त भविष्य');
        $response->assertSeeText('हर जीवन के लिए');
        $response->assertSeeText('स्वास्थ्य सेवा');
        $response->assertSeeText('हरित पर्यावरण, समृद्ध पीढ़ियां');
        $response->assertSeeText('महिला सशक्तिकरण, परिवार का विकास');
        $response->assertSee('पिछला बैनर');
        $response->assertSee('अगला बैनर');
    }

    public function test_hero_carousel_has_no_horizontal_slide_track()
    {
        $response = $this->get(route('home'));
        $content = $response->getContent();

        // Extract hero-carousel-section
        preg_match('/<section id="hero-carousel-section".*?<\/section>/s', $content, $matches);
        $heroHtml = $matches[0] ?? '';

        $this->assertNotEmpty($heroHtml);
        $this->assertStringNotContainsString('transform: translateX', $heroHtml);
        $this->assertStringNotContainsString('-translate-x-full', $heroHtml);
        $this->assertStringNotContainsString('carousel-track', $heroHtml);
        $this->assertStringContainsString('opacity-100 z-10', $heroHtml);
        $this->assertStringContainsString('opacity-0 z-0', $heroHtml);
    }
}
