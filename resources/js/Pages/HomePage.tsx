import Footer from "@/Layouts/Footer"
import PageLayout from "@/Layouts/PageLayout"
import { CoursesSection } from "@/Features/Courses"
import { OutreachSection } from "@/Features/Outreach"
import { Biography, Hero } from "@/Features/Profile"
import { ResearchSection } from "@/Features/Research"

export default function HomePage() {
  return (
    <PageLayout>
      <Hero />
      <Biography />
      <ResearchSection />
      <CoursesSection />
      <OutreachSection />
      <Footer />
    </PageLayout>
  )
}
