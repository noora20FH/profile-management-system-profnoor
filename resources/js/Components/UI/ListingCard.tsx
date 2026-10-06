import Card from "./Card";

import { listingPages } from "@/data/mocks";
import type { ListingItem, ListingType } from "@/types/common";

type ListingCardProps = {
  item: ListingItem;
  type: ListingType;
};

export default function ListingCard({ item, type }: ListingCardProps) {
  const config = listingPages[type];

  return (
    <Card className="listing-card">
      {item.image ? (
        <img className="listing-card-image" src={item.image} alt="" />
      ) : (
        <div className="listing-card-image listing-card-image--empty" />
      )}
      <div className="listing-card-body">
        <div className="listing-card-meta">
          <span>
            {item.code ??
              (item.year === "previous" ? config.previousLabel : item.year)}
          </span>
          <small>
            {item.term ??
              (type === "outreach" ? "DAMPAK AKTIF" : "Referensi Makalah")}
          </small>
        </div>
        <h2>{item.title}</h2>
        <p>{item.description}</p>
        {type === "research" && (
          <>
            <div className="asset-divider">
              <img src={config.assets.divider} alt="" />
            </div>
            <small className="listing-card-source">{item.meta}</small>
          </>
        )}
        {type === "outreach" && item.metrics && (
          <div className="impact-metrics">
            <span>
              <img src={config.assets.primaryMetricIcon} alt="" />
              {item.metrics[0]}
            </span>
            <span>
              <img src={config.assets.secondaryMetricIcon} alt="" />
              {item.metrics[1]}
            </span>
          </div>
        )}
        <a
          href={
            type === "courses"
              ? (item.syllabus_url ?? "#")
              : type === "research"
                ? (item.url ?? "#")
                : "#"
          }
          target={
            type === "courses" || type === "research" ? "_blank" : undefined
          }
          rel="noopener noreferrer"
        >
          {type === "research"
            ? "Baca Publikasi Lengkap"
            : type === "courses"
              ? "Lihat Detail & Silabus"
              : "Pelajari Lebih Lanjut tentang Dampak"}
          <img src={config.assets.arrow} alt="" />
        </a>
      </div>
    </Card>
  );
}
