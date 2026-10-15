import ResearchCard from "./ResearchCard";
import type { ResearchProject } from "../types";
import type { ListingPageData } from "@/types/common";

type Props = {
  projects: ResearchProject[];
  config: ListingPageData;
};

export default function ResearchList({ projects, config }: Props) {
  return (
    <div className="listing-grid">
      {projects.map((project) => (
        <ResearchCard key={project.id} project={project} config={config} />
      ))}
    </div>
  );
}