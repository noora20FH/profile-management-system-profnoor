import { useState } from "react";
import FeaturePageLayout from "@/Layouts/FeaturePageLayout";
import PublicationList from "@/Features/Publication/components/PublicationList";
import type { Publication, PublicationType } from "@/Features/Publication/types";

// Sesuaikan interface dengan kembalian pageData() di PHP
interface Props {
  publication: {
    eyebrow: string;
    title: string;
    description: string;
    allLabel: string;
    previousLabel: string;
    filterLabel: string;
    resultLabel: string;
    landing: {
      eyebrow: string;
      title: string;
      ctaLabel: string;
      featuredCount: number;
    };
    items: Publication[];
    assets: any;
  };
}

type FilterType = "all" | PublicationType;

export default function PublicationPage({ publication }: Props) {
  const [typeFilter, setTypeFilter] = useState<FilterType>("all");

  const filteredPublications = publication.items.filter((item) => {
    if (typeFilter === "all") return true;
    return item.type === typeFilter;
  });

  return (
    <FeaturePageLayout
      type="publication"
      config={{
        // GUNAKAN DATA DARI BACKEND, JANGAN HARDCODE LAGI
        eyebrow: publication.eyebrow,
        title: publication.title,
        description: publication.description,
        allLabel: publication.allLabel,
        previousLabel: publication.previousLabel,
        filterLabel: publication.filterLabel, // Ini akan menimpa "Filter berdasarkan Tahun:"
        resultLabel: publication.resultLabel,
        landing: publication.landing,
        assets: {
          eyebrowIcon: undefined,
          chevron: "/assets/courses/ee510.svg",
          arrow: "/assets/courses/a93d8.svg",
          logo: "/assets/courses/325dd.svg",
        },
        // Layout butuh bentuk item tertentu
        items: publication.items.map((item) => ({
          id: String(item.id),
          title: item.title,
          description: item.abstract ?? "",
          year: item.year ?? "",
        })),
      }}
      publicationFilter={{
        value: typeFilter,
        onChange: setTypeFilter,
      }}
    >
      {(items) => (
        <PublicationList
          publications={filteredPublications.filter((p) =>
            items.some((filtered) => filtered.id === String(p.id)),
          )}
        />
      )}
    </FeaturePageLayout>
  );
}