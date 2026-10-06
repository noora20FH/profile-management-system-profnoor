<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_rendered(): void
    {
        $this->get("/")
            ->assertOk()
            ->assertInertia(
                fn(AssertableInertia $page) => $page
                    ->component("HomePage")
                    ->has("research")
                    ->has("courses")
                    ->has("outreach"),
            );
    }

    public function test_catalog_pages_are_rendered(): void
    {
        $this->get("/riset")
            ->assertOk()
            ->assertInertia(
                fn(AssertableInertia $page) => $page
                    ->component("ResearchPage")
                    ->has("page"),
            );

        $this->get("/mata-kuliah")
            ->assertOk()
            ->assertInertia(
                fn(AssertableInertia $page) => $page
                    ->component("CoursesPage")
                    ->has("page"),
            );

        $this->get("/pengabdian")
            ->assertOk()
            ->assertInertia(
                fn(AssertableInertia $page) => $page
                    ->component("OutreachPage")
                    ->has("page"),
            );
    }
}
