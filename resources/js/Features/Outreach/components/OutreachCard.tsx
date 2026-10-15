import ListingCard from "@/Components/UI/ListingCard";
import type { OutreachProgram } from "../types";
import type { ListingPageData } from "@/types/common";

type Props = {
  program: OutreachProgram;
  config: ListingPageData;
};

export default function OutreachCard({ program, config }: Props) {
  return (
    <ListingCard
      item={program}
      type="outreach"
      config={config}
      headingLevel="h3"
      eyebrow={program.category}
    />
  );
}