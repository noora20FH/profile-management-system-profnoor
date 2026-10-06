import CourseList from "./CourseList"

import { SectionHeading } from "@/Features/Profile"
import useCourses from "@/hooks/useCourses"

export default function CoursesSection() {
  const page = useCourses()
  const featuredCourses = page.items.slice(0, page.landing.featuredCount)

  return (
    <section className="courses section-shell section-light" id="mata-kuliah">
      <SectionHeading
        eyebrow={page.landing.eyebrow}
        title={page.landing.title}
      />
      <CourseList arrow={page.assets.arrow} courses={featuredCourses} />
      <a className="button button--primary section-cta" href="/mata-kuliah">
        {page.landing.ctaLabel}
      </a>
    </section>
  )
}
