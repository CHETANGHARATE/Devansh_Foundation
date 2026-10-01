<?php

namespace Tests\Feature;

use App\Models\Award;
use App\Models\TeamMember;
use App\Models\TransparencyDocument;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutSubpagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_about_main_page_renders_successfully()
    {
        $response = $this->withSession(['locale' => 'en'])->get(route('about'));
        $response->assertStatus(200);
        $response->assertSeeText('About Us');
        $response->assertSeeText('Transparency & Legal Documents');
        $response->assertSeeText('Our Team');
        $response->assertSeeText('Awards');
    }

    public function test_transparency_page_renders_with_8_documents()
    {
        $response = $this->withSession(['locale' => 'en'])->get(route('about.transparency'));
        $response->assertStatus(200);
        $response->assertSeeText('Transparency & Legal Documents');
        $response->assertSeeText('Our Commitment to Transparency');
        $response->assertSeeText('Registration Certificate');
        $response->assertSeeText('Trust / Society Registration Deed');
        $response->assertSeeText('Section 12A Registration');
        $response->assertSeeText('Section 80G Tax Exemption Certificate');
        $response->assertSeeText('Donation Utilization & Fund Allocation Report');
        $response->assertSeeText('DEMO');

        $this->assertEquals(8, TransparencyDocument::count());
    }

    public function test_team_page_renders_with_6_members()
    {
        $response = $this->withSession(['locale' => 'en'])->get(route('about.team'));
        $response->assertStatus(200);
        $response->assertSeeText('Our Team');
        $response->assertSeeText('Together, We Create Change');
        $response->assertSeeText('Founder & Trustee');
        $response->assertSeeText('Program Coordinator');
        $response->assertSee('member-1.jpg');

        $this->assertEquals(6, TeamMember::count());
    }

    public function test_awards_page_renders_with_4_awards()
    {
        $response = $this->withSession(['locale' => 'en'])->get(route('about.awards'));
        $response->assertStatus(200);
        $response->assertSeeText('Awards & Recognition');
        $response->assertSeeText('Community Impact Recognition');
        $response->assertSeeText('Excellence in Social Initiative');
        $response->assertSeeText('Education Support Recognition');
        $response->assertSeeText('2025');
        $response->assertSeeText('2024');

        $this->assertEquals(4, Award::count());
    }

    public function test_marathi_locale_switch_works_for_about_subpages()
    {
        $response = $this->withSession(['locale' => 'mr'])->get(route('about.transparency'));
        $response->assertStatus(200);
        $response->assertSeeText('पारदर्शकता आणि कायदेशीर कागदपत्रे');
        $response->assertSeeText('संस्था नोंदणी प्रमाणपत्र');
    }

    public function test_hindi_locale_switch_works_for_about_subpages()
    {
        $response = $this->withSession(['locale' => 'hi'])->get(route('about.team'));
        $response->assertStatus(200);
        $response->assertSeeText('हमारी टीम');
    }

    public function test_admin_can_access_transparency_crud()
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.transparency.index'));
        $response->assertStatus(200);
        $response->assertSeeText('Transparency & Legal Documents');
        $response->assertSeeText('Registration Certificate');

        $createResponse = $this->actingAs($admin)->get(route('admin.transparency.create'));
        $createResponse->assertStatus(200);

        $postResponse = $this->actingAs($admin)->post(route('admin.transparency.store'), [
            'title_en' => 'FCRA Compliance Certificate',
            'title_mr' => 'FCRA नोंदणी प्रमाणपत्र',
            'title_hi' => 'FCRA पंजीकरण प्रमाण पत्र',
            'document_type' => 'other',
            'icon' => 'shield-check',
            'order' => 9,
            'is_demo' => true,
            'is_published' => true,
        ]);

        $postResponse->assertRedirect(route('admin.transparency.index'));
        $this->assertDatabaseHas('transparency_documents', ['slug' => 'fcra-compliance-certificate']);
    }

    public function test_admin_can_access_team_crud()
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.team.index'));
        $response->assertStatus(200);
        $response->assertSeeText('Our Team');
        $response->assertSeeText('Founder & Trustee');

        $postResponse = $this->actingAs($admin)->post(route('admin.team.store'), [
            'name_en' => 'Dr. Aarti Deshmukh',
            'name_mr' => 'डॉ. आरती देशमुख',
            'role_en' => 'Medical Advisor',
            'role_mr' => 'वैद्यकीय सल्लागार',
            'order' => 7,
            'is_demo' => false,
            'is_active' => true,
        ]);

        $postResponse->assertRedirect(route('admin.team.index'));
        $this->assertDatabaseHas('team_members', ['slug' => 'dr-aarti-deshmukh']);
    }

    public function test_admin_can_access_awards_crud()
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.awards.index'));
        $response->assertStatus(200);
        $response->assertSeeText('Awards & Recognition');

        $postResponse = $this->actingAs($admin)->post(route('admin.awards.store'), [
            'title_en' => 'State Youth Empowerment Award',
            'title_mr' => 'राज्य युवा सक्षमीकरण पुरस्कार',
            'year' => '2026',
            'category' => 'Youth Welfare',
            'order' => 5,
            'is_demo' => true,
            'is_published' => true,
        ]);

        $postResponse->assertRedirect(route('admin.awards.index'));
        $this->assertDatabaseHas('awards', ['slug' => 'state-youth-empowerment-award-2026']);
    }
}
