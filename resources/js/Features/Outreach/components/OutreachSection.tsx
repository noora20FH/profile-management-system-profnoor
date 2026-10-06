import OutreachList from "./OutreachList"

import { SectionHeading } from "@/Features/Profile"
import useOutreach from "@/hooks/useOutreach"

export default function OutreachSection() {
  const page = useOutreach()
  const featuredPrograms = page.items.slice(0, page.landing.featuredCount)

  return (
    <section className="green-section section-shell" id="pengabdian">
      <SectionHeading
        eyebrow={page.landing.eyebrow}
        title={page.landing.title}
        light
      />
      <OutreachList programs={featuredPrograms} />
      <a className="button button--dark section-cta" href="/pengabdian">
        {page.landing.ctaLabel}
      </a>
    </section>
  )
}
