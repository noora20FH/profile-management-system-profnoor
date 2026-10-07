export type ListingType = "research" | "courses" | "outreach";

export type ListingYear = string;

export type ListingItem = {
  id: string;
  year: ListingYear;
  image?: string;
  title: string;
  description: string;
  meta?: string;
  term?: string;
  code?: string;
  category?: string;
  metrics?: [string, string];
    // External links
  url?: string | null;
  publication_url?:string | null;
  syllabus_url?:string | null;
  impact_url?:string | null;
};

export type ListingPageData = {
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
  items: ListingItem[];
  assets: {
    chevron: string;
    arrow: string;
    logo: string;
    eyebrowIcon?: string;
    divider?: string;
    filterIcon?: string;
    primaryMetricIcon?: string;
    secondaryMetricIcon?: string;
  };
};

export type InertiaPageProps = {
  courses?: ListingPageData;
  outreach?: ListingPageData;
  page?: ListingPageData;
  profileMetrics?: Array<{
    value: string;
    label: string;
    detail: string;
  }>;
  research?: ListingPageData;
  [key: string]: unknown;
};

export const listingFilters = [
  "all",
  "2026",
  "2025",
  "2024",
  "2023",
  "previous",
] as const;

export type ListingFilterValue = (typeof listingFilters)[number];
