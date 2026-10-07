import type { OutreachProgram } from "../types";

type OutreachCardProps = {
  program: OutreachProgram;
};

export default function OutreachCard({ program }: OutreachCardProps) {
  console.log("OUTREACH DATA:", program);
  return (
    <article className="outreach-card">
      <img src={program.image} alt="" />
      <div>
        <small>{program.category}</small>
        <h3>{program.title}</h3>
        <p>{program.description}</p>
        <a href={program.impact_url} target="_blank" rel="noopener noreferrer">
          Pelajari Lebih Lanjut tentang Dampak
        </a>
      </div>
      
    </article>
  );
}
