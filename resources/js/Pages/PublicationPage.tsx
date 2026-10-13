import FeaturePageLayout from "@/Layouts/FeaturePageLayout";

import PublicationList from "@/Features/Publication/components/PublicationList";

import type { Publication } from "@/Features/Publication/types";
import { ListingPageData } from "@/types/common";

interface Props {
  publication: {
    items: Publication[];
  };
}

export default function PublicationPage({ publication }: Props) {
  const config: ListingPageData = {
    eyebrow: "Publication",

    title: "Publikasi Ilmiah",

    description: "Daftar publikasi penelitian",

    allLabel: "Semua",

    previousLabel: "Sebelumnya",

    filterLabel: "Filter",

    resultLabel: "Publikasi",

    landing: {
      eyebrow: "Publication",

      title: "Publikasi",

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
  const publications = publication.items;

  return (
    <FeaturePageLayout type="publication" config={config}>
      {(items) => (
        <PublicationList
          publications={publications.filter((item) =>
            items.some((filtered) => filtered.id === String(item.id)),
          )}
        />
      )}
    </FeaturePageLayout>
  );
}
