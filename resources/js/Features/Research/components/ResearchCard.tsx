import type { ResearchProject } from "../types"

type ResearchCardProps = {
  project: ResearchProject
}

export default function ResearchCard({ project }: ResearchCardProps) {
  return (
    <article className="research-card">
      <img src={project.image} alt="" />
      <div className="card-copy">
        <h3>{project.title}</h3>
        <p>{project.description}</p>
        <small>{project.meta}</small>
      </div>
    </article>
  )
}
