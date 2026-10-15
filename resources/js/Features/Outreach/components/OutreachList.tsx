import OutreachCard from "./OutreachCard";
import type { OutreachProgram } from "../types";
import type { ListingPageData } from "@/types/common";

type Props = {
  programs: OutreachProgram[];
  config: ListingPageData;
};

export default function OutreachList({ programs, config }: Props) {
  return (
    <div className="listing-grid">
      {programs.map((program) => (
        <OutreachCard key={program.id} program={program} config={config} />
      ))}
    </div>
  );
}