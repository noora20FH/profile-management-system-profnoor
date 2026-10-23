import { usePage } from "@inertiajs/react";

import Navbar from "@/Layouts/Navbar";
import type { InertiaPageProps, ProfileMetric } from "@/types/common";
import { assetPath } from "@/utils/asset";

const FALLBACK_METRICS: ProfileMetric[] = [
  {
    value: "18+",
    label: "Tahun Pengalaman",
    detail: "Riset & pengajaran di bidang sistem terdistribusi.",
  },
  {
    value: "120+",
    label: "Publikasi Ilmiah",
    detail: "Jurnal & konferensi internasional bereputasi.",
  },
  {
    value: "35+",
    label: "Program Pengabdian",
    detail: "Kolaborasi dengan desa mitra & komunitas.",
  },
];

export default function Hero() {
  const { profile, profileMetrics } = usePage<InertiaPageProps>().props;

  const name = profile?.name ?? "Prof. Mohammad Noor Hidayat";
  const statusPill = profile?.status_pill ?? "KETUA ILMU & TEKNIK KOMPUTER";
  const heroDescription =
    profile?.hero_description ??
    "Merintis sistem AI terdistribusi, kerangka komputasi edge terfederasi yang aman, dan solusi jaringan tangguh berskala global. Berdedikasi untuk mendidik generasi penerus akademisi komputasi dan mengubah teknologi mentah menjadi manfaat bagi komunitas global.";

  const heroPhoto =
    profile?.hero_photo_url ?? profile?.photo_url ?? assetPath("2e406.png");

  const ctaPrimaryLabel =
    profile?.hero_cta_primary_label ?? "Lihat Daftar Penelitian";
  const ctaPrimaryUrl = profile?.hero_cta_primary_url ?? "/Penelitian";
  const ctaSecondaryLabel = profile?.hero_cta_secondary_label ?? "Hubungi Saya";

  const email = profile?.email ?? "moh.noor@polinema.ac.id";

  const metrics: ProfileMetric[] =
    (profileMetrics && profileMetrics.length > 0
      ? profileMetrics
      : profile?.hero_metrics) ?? FALLBACK_METRICS;

  // Gmail compose URL — kalau CTA secondary label mengandung "Hubungi"
  const gmailComposeUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(
    email,
  )}&su=${encodeURIComponent("Konsultasi Akademik")}`;

  return (
    <>
      <div className="hero-shell" id="beranda">
        <Navbar />
        <main className="hero section-shell">
          <div className="hero-copy">
            <div className="hero-title-block">
              <p className="status-pill">
                <span aria-hidden="true" />
                {statusPill}
              </p>
              <h1>{name}</h1>
              <p className="hero-description">{heroDescription}</p>
            </div>

            <div className="button-row">
              <a className="button button--primary" href={ctaPrimaryUrl}>
                {ctaPrimaryLabel}
              </a>

              {profile?.hero_cta_secondary_label ? (
                <a
                  className="button button--outline"
                  href={gmailComposeUrl}
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  {ctaSecondaryLabel}
                </a>
              ) : (
                <a
                  className="button button--outline"
                  href={gmailComposeUrl}
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  {ctaSecondaryLabel}
                </a>
              )}
            </div>
          </div>
          <div
            className="hero-portrait"
            onContextMenu={(e) => e.preventDefault()} // Mencegah klik kanan
            onTouchStart={(e) => e.preventDefault()} // Mencegah sentuhan panjang
            style={{ userSelect: "none" }} // Mencegah seleksi
          >
            <img
              src={heroPhoto}
              alt={name}
              draggable={false} // Mencegah drag & drop
              onDragStart={(e) => e.preventDefault()}
              style={{ pointerEvents: "none" }} // Mematikan interaksi mouse langsung ke gambar
              
            />
          </div>
        </main>
      </div>

      <section
        className="metrics section-shell"
        aria-label="Pencapaian akademik"
      >
        {metrics.map((metric) => (
          <article className="metric-card" key={metric.label}>
            <strong>{metric.value}</strong>
            <h3>{metric.label}</h3>
            <p>{metric.detail}</p>
          </article>
        ))}
      </section>
    </>
  );
}
