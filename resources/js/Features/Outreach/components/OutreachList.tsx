import OutreachCard from "./OutreachCard"

import type { OutreachProgram } from "../types"

type OutreachListProps = {
  programs: OutreachProgram[]
}

export default function OutreachList({ programs }: OutreachListProps) {
  return (
    <div className="outreach-grid">
      {programs.map((program) => (
        <OutreachCard key={program.id} program={program} />
      ))}
    </div>
  )
}
