import CourseCard from "./CourseCard";
import type { Course } from "../types";
import type { ListingPageData } from "@/types/common";

type Props = {
  courses: Course[];
  config: ListingPageData;
};

export default function CourseList({ courses, config }: Props) {
  return (
    <div className="listing-grid">
      {courses.map((course) => (
        <CourseCard key={course.id} course={course} config={config} />
      ))}
    </div>
  );
}