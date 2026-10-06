import type { OutreachProgram } from "../types"

type OutreachCardProps = {
  program: OutreachProgram
}

export default function OutreachCard({ program }: OutreachCardProps) {
  return (
    <article className="outreach-card">
      <img src={program.image} alt="" />
      <div>
        <small>{program.category}</small>
        <h3>{program.title}</h3>
        <p>{program.description}</p>
        <a href="/pengabdian">Pelajari Lebih Lanjut Dampak Tim Kami</a>
      </div>
    </article>
  )
}
