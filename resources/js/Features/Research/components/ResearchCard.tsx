import ListingCard from "@/Components/UI/ListingCard";
import type { ResearchProject } from "../types";
import type { ListingPageData } from "@/types/common";

type Props = {
  project: ResearchProject;
  config: ListingPageData;
};

export default function ResearchCard({ project, config }: Props) {
  return (
    <ListingCard
      item={project}
      type="research"
      config={config}
      headingLevel="h3"
      eyebrow={project.meta}
    />
  );
}