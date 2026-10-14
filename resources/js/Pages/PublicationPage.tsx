import { useState } from "react";

import FeaturePageLayout from "@/Layouts/FeaturePageLayout";

import PublicationList from "@/Features/Publication/components/PublicationList";

import PublicationFilter from "@/Features/Publication/components/PublicationFilter";

import type {
  Publication,
  PublicationType,
} from "@/Features/Publication/types";

import type { ListingPageData } from "@/types/common";

interface Props {
  publication: {
    items: Publication[];
  };
}

type FilterType = "all" | PublicationType;

export default function PublicationPage({ publication }: Props) {
  const [typeFilter, setTypeFilter] = useState<FilterType>("all");

  const config: ListingPageData = {
    eyebrow: "Publikasi",

    title: "Publikasi Ilmiah",

    description: "Daftar publikasi penelitian",

    allLabel: "Semua",

    previousLabel: "Sebelumnya",

    filterLabel: "Filter berdasarkan Tahun:",

    resultLabel: "Publikasi",

    landing: {
      eyebrow: "Publikasi",

      title: "Publikasi Ilmiah",

      ctaLabel: "Lihat",

      featuredCount: 3,
    },

    items: publication.items.map((item) => ({
      id: String(item.id),

      title: item.title,

      description: item.abstract ?? "",

      year: item.year ?? "",
    })),

    assets: {
      eyebrowIcon: undefined,

      chevron: "/assets/courses/ee510.svg",

      arrow: "/assets/courses/a93d8.svg",

      logo: "/assets/courses/325dd.svg",
    },
  };

  const filteredPublications = publication.items.filter((item) => {
    if (typeFilter === "all") {
      return true;
    }

    return item.type === typeFilter;
  });

  return (
    <FeaturePageLayout
      type="publication"
      config={config}
      publicationFilter={{
        value: typeFilter,
        onChange: setTypeFilter,
      }}
    >
      {(items) => (
        <PublicationList
          publications={filteredPublications.filter((publication) =>
            items.some((filtered) => filtered.id === String(publication.id)),
          )}
        />
      )}
    </FeaturePageLayout>
  );
}
