export type ListingType = "research" | "courses" | "outreach" | "publication"| "trackrecord";

export type ListingYear = string;

export type ListingItem = {
  id: string;
  year: ListingYear;
  image_url?: string;
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
  video_url?:string | null;
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



export const listingFilters = [
  "all",
  "2026",
  "2025",
  "2024",
  "2023",
  "previous",
] as const;

export type ListingFilterValue = (typeof listingFilters)[number];

export type ProfileMetric = {
  value: string;
  label: string;
  detail: string;
};

export type ProfileQualification = {
  degree: string;
  institution: string;
};

export type ProfileData = {
  id: number;
  name: string;
  title: string;
  status_pill: string | null;
  email: string | null;
  phone: string | null;
  institution: string | null;
  hero_description: string | null;
  hero_photo_url: string | null;
  photo_url: string | null;
  hero_cta_primary_label: string | null;
  hero_cta_primary_url: string | null;
  hero_cta_secondary_label: string | null;
  hero_metrics: ProfileMetric[] | null;
  biography_photo_url: string | null;
  biography_eyebrow: string | null;
  biography_title: string | null;
  biography_paragraphs: string[] | null;
  qualifications: ProfileQualification[] | null;
  expertise_tags: string[] | null;
  biography: string | null;
};

export type InertiaPageProps = {
  appName?: string;
  profile?: ProfileData | null;
  profileMetrics?: ProfileMetric[];
  courses?: ListingPageData;
  outreach?: ListingPageData;
  page?: ListingPageData;
  research?: ListingPageData;
  publication?: ListingPageData;
  [key: string]: unknown;
  email?: string;
};
