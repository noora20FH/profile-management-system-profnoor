import Card from "./Card";

import type { ListingItem, ListingType, ListingPageData } from "@/types/common";

type Props = {
  item: ListingItem;

  type: ListingType;

  config: ListingPageData;
};

export default function ListingCard({ item, type, config }: Props) {
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
        <img className="listing-card-image" src={item.image} />
      ) : (
        <div className="listing-card-image listing-card-image--empty" />
      )}

      <div className="listing-card-body">
        <h2>{item.title}</h2>

        <p>{item.description}</p>

        {/* LINK VIDEO KHUSUS PENGABDIAN */}

        {type === "outreach" && item.video_url && (
          <a href={item.video_url} target="_blank" rel="noopener noreferrer">
            Tonton Dokumentasi Program →
          </a>
        )}

        {/* LINK VIDEO KHUSUS PENELITIAN */}

        {type === "research" && item.video_url && (
          <a href={item.video_url} target="_blank" rel="noopener noreferrer">
            Tonton Dokumentasi Penelitian →
          </a>
        )}

        {/* LINK UTAMA */}

        {href && (
          <a href={href} target="_blank" rel="noopener noreferrer">
            {actionLabel}

            <img src={config.assets.arrow} />
          </a>
        )}
      </div>
    </Card>
  );
}
