export type PublicationType =
  | "book"
  | "journal"
  | "proceeding"
  | "patent"
  | "prototype"
  | "ttg";

export interface ResearchProject {
  id: number;

  title: string;
}

export interface Publication {
  id: number;
  year?: string | null;

  type: PublicationType;

  type_label: string;

  title: string;

  slug: string;

  abstract?: string | null;

  published_at?: string | null;

  doi?: string | null;

  url?: string | null;

  file_url?: string | null;

  thumbnail?: string | null;

  research_project?: ResearchProject | null;
}
