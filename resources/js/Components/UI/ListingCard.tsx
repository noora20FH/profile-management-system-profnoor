import Card from "./Card";

import type { ListingItem, ListingType, ListingPageData } from "@/types/common";

type Props = {
  item: ListingItem;
  type: ListingType;
  config: ListingPageData;
  /** default "h2" — pakai "h3" saat dipakai di dalam section homepage */
  headingLevel?: "h2" | "h3";
  /** baris kecil di atas judul, mis. "IF101 • Semester 1 2026" */
  eyebrow?: string;
};

export default function ListingCard({
  item,
  type,
  config,
  headingLevel: Heading = "h2",
  eyebrow,
}: Props) {
  const href =
    type === "research"
      ? item.publication_url
      : type === "courses"
        ? item.syllabus_url
        : item.impact_url;

  const actionLabel =
    type === "research"
      ? "Baca Publikasi Lengkap"
      : type === "courses"
        ? "Masuk halaman LMS"
        : "Pelajari Lebih Lanjut tentang Dampak";

  return (
    <Card className="listing-card">
      {item.image ? (
        <img
          className="listing-card-image"
          src={item.image}
          alt={item.title}
        />
      ) : (
        <div className="listing-card-image listing-card-image--empty" />
      )}

      <div className="listing-card-body">
        {eyebrow && <small className="listing-card-eyebrow">{eyebrow}</small>}

        <Heading>{item.title}</Heading>

        <p>{item.description}</p>

        {type === "outreach" && item.video_url && (
          <a href={item.video_url} target="_blank" rel="noopener noreferrer">
            Tonton Dokumentasi Program →
          </a>
        )}

        {type === "research" && item.video_url && (
          <a href={item.video_url} target="_blank" rel="noopener noreferrer">
            Tonton Dokumentasi Penelitian →
          </a>
        )}

        {href && (
          <a href={href} target="_blank" rel="noopener noreferrer">
            {actionLabel}
            {config.assets?.arrow && (
              <img src={config.assets.arrow} alt="" />
            )}
          </a>
        )}
      </div>
    </Card>
  );
}