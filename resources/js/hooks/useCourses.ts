import { usePage } from "@inertiajs/react"

import { coursesMock } from "@/data/mocks"
import { getCourses } from "@/Features/Courses/services/course.service"
import type { InertiaPageProps } from "@/types/common"

export default function useCourses() {
  return (
    usePage<InertiaPageProps>().props.courses ?? getCourses() ?? coursesMock
  )
}
