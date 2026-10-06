import ResearchCard from "./ResearchCard"

import type { ResearchProject } from "../types"

type ResearchListProps = {
  projects: ResearchProject[]
}

export default function ResearchList({ projects }: ResearchListProps) {
  return (
    <div className="research-grid">
      {projects.map((project) => (
        <ResearchCard key={project.id} project={project} />
      ))}
    </div>
  )
}
