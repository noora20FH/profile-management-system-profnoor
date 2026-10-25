export type TrackRecordItem = {
  id: number;
  type: 'reviewer' | 'assessor' | 'award';
  title: string;
  institution: string | null;
  scope: string | null;
  details: string | null;
  year: string | null;
};

export type TrackRecordData = {
  eyebrow: string;
  title: string;
  description: string;
  reviewers: TrackRecordItem[];
  assessors: TrackRecordItem[];
  awards: TrackRecordItem[];
};