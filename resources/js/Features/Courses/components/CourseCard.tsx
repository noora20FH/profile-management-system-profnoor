import ListingCard from "@/Components/UI/ListingCard";
import type { Course } from "../types";
import type { ListingPageData } from "@/types/common";

type Props = {
  course: Course;
  config: ListingPageData;
};

export default function CourseCard({ course, config }: Props) {
  const eyebrow = [course.code, course.term].filter(Boolean).join(" • ");

  return (
    <ListingCard
      item={course}
      type="courses"
      config={config}
      headingLevel="h3"
      eyebrow={eyebrow}
    />
  );
}