import CourseCard from "./CourseCard"

import type { Course } from "../types"

type CourseListProps = {
  arrow: string
  courses: Course[]
}

export default function CourseList({ arrow, courses }: CourseListProps) {
  return (
    <div className="course-grid">
      {courses.map((course) => (
        <CourseCard arrow={arrow} course={course} key={course.id} />
      ))}
    </div>
  )
}
