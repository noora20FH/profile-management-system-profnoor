import ResearchList from "./ResearchList";
import { SectionHeading } from "@/Features/Profile";
import useResearch from "@/hooks/useResearch";

export default function ResearchSection() {
  const page = useResearch();
  const featuredProjects = page.items.slice(0, page.landing.featuredCount);

  return (
    <section className="green-section section-shell" id="Penelitian">
      <SectionHeading
        eyebrow={page.landing.eyebrow}
        title={page.landing.title}
        light
      />
      <ResearchList projects={featuredProjects} config={page} />
      <a className="button button--dark section-cta" href="/penelitian">
        {page.landing.ctaLabel}
      </a>
    </section>
  );
}