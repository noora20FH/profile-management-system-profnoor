import { useState } from "react";

import Footer from "./Footer";
import Navbar from "./Navbar";
import PageLayout from "./PageLayout";

import ListingCard from "@/Components/UI/ListingCard";
import ListingFilter from "@/Components/UI/ListingFilter";
import useListingPage from "@/hooks/useListingPage";
import type { ListingFilterValue, ListingType } from "@/types/common";

type FeaturePageLayoutProps = {
  type: ListingType;
};


export default function FeaturePageLayout({ type }: FeaturePageLayoutProps) {
  const [filter, setFilter] = useState<ListingFilterValue>("all");
  const config = useListingPage(type);
  const previousItems = config.items.filter((item) => item.year === "previous");

  const filteredItems = config.items.filter((item) => {
    if (filter === "all") {
      return true;
    }

    if (filter === "previous") {
      return Number(item.year) < 2023;
    }

    return item.year === filter;
  });

  return (
    <PageLayout className={`detail-page detail-page--${type}`}>
      <Navbar active={type} />
      <main>
        <section className="listing-intro section-shell">
          <div className="listing-title">
            <p>
              {config.assets.eyebrowIcon && (
                <img src={config.assets.eyebrowIcon} alt="" />
              )}
              {config.eyebrow}
            </p>
            <h1>{config.title}</h1>
            <p>{config.description}</p>
          </div>
          <ListingFilter type={type} value={filter} onChange={setFilter} />
        </section>
        <section className="listing-grid section-shell" aria-live="polite">
          {filteredItems.map((item) => (
            <ListingCard item={item} key={item.id} type={type} config={config} />
          ))}
        </section>
      </main>
      <Footer logo={config.assets.logo} />
    </PageLayout>
  );
}
