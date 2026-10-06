import type { Course } from "../types"

type CourseCardProps = {
  course: Course
  arrow: string
}

export default function CourseCard({ course, arrow }: CourseCardProps) {
  return (
    <article className="course-card">
      <div className="course-meta">
        <strong>{course.code}</strong>
        <span>{course.term}</span>
      </div>
      <h3>{course.title}</h3>
      <p>{course.description}</p>
      <a href={`mailto:m.noorhidayat@mit.edu?subject=Silabus ${course.code}`}>
        Unduh Silabus Mata Kuliah
        <img src={arrow} alt="" />
      </a>
    </article>
  )
}
