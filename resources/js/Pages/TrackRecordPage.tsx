import PageLayout from "@/Layouts/PageLayout";
import Navbar from "@/Layouts/Navbar";
import Footer from "@/Layouts/Footer";
import { TrackRecordData } from "@/Features/TrackRecord/types";
import ReviewerTable from "@/Features/TrackRecord/components/ReviewerTable";
import AssessorTable from "@/Features/TrackRecord/components/AssessorTable";
import AwardTable from "@/Features/TrackRecord/components/AwardTable";

type Props = {
  records: TrackRecordData;
};

export default function TrackRecordPage({ records }: Props) {
  return (
    <PageLayout className="detail-page detail-page--trackrecord">
      <Navbar active="trackrecord" />

      <main>
        {/* HEADER SECTION (Sejajar dengan Section Shell) */}
        <section className="listing-intro section-shell">
          <div className="listing-title">
            <p>{records.eyebrow}</p>
            <h1>{records.title}</h1>
            <p>{records.description}</p>
          </div>
        </section>

        {/* TABLES SECTION */}
        {/* Hapus max-w-5xl mx-auto dan bg-white agar tabel full width sejajar judul */}
        <section className="section-shell pb-24 pt-8">
          <div className="space-y-8">
            <ReviewerTable items={records.reviewers} />
            <AssessorTable items={records.assessors} />
            <AwardTable items={records.awards} />
          </div>
        </section>
      </main>

      <Footer />
    </PageLayout>
  );
}