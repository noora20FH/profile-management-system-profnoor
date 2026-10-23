import SectionHeading from "./SectionHeading";

import { usePage } from "@inertiajs/react";

import type { InertiaPageProps, ProfileQualification } from "@/types/common";
import { assetPath } from "@/utils/asset";

const FALLBACK_TAGS: string[] = [
  "Sistem Terdistribusi",
  "Komputasi Edge AI",
  "Pembelajaran Terfederasi",
  "Ketahanan Bizantium",
  "Kedaulatan Data",
];

const FALLBACK_PARAGRAPHS: string[] = [
  "Prof. Mohammad Noor Hidayat adalah Profesor Sistem Terdistribusi dengan jalur tenur di Institut Teknologi Metropolitan. Selama lebih dari 18 tahun, kelompok Penelitiannya berkarya di persimpangan antara model kecerdasan buatan berdimensi tinggi yang kompleks dan perangkat keras jaringan terdesentralisasi.",
  "Ia meraih gelar Ph.D. dalam Ilmu Komputer dari Universitas Cambridge dengan spesialisasi pada model eksekusi transaksional berkinerja tinggi. Ia merupakan penerima langsung berbagai penghargaan makalah internasional bergengsi dan saat ini bertugas dalam dewan penasihat komputasi global untuk standar jaringan generasi berikutnya.",
];

const FALLBACK_QUALIFICATIONS: ProfileQualification[] = [
  {
    degree: "Ph.D. CS",
    institution:
      "Universitas Cambridge (Divisi Spesialis Sistem Terdistribusi)",
  },
  {
    degree: "M.Sc. Eng",
    institution:
      "Universitas Teknik Nasional (Arsitektur Paralel Berkinerja Tinggi)",
  },
];

export default function Biography() {
  const { profile } = usePage<InertiaPageProps>().props;

  const eyebrow = profile?.biography_eyebrow ?? "BIOGRAFI";
  const title = profile?.biography_title ?? "Latar Belakang Akademik";
  const paragraphs =
    profile?.biography_paragraphs && profile.biography_paragraphs.length > 0
      ? profile.biography_paragraphs
      : FALLBACK_PARAGRAPHS;

  const qualifications =
    profile?.qualifications && profile.qualifications.length > 0
      ? profile.qualifications
      : FALLBACK_QUALIFICATIONS;

  const tags =
    profile?.expertise_tags && profile.expertise_tags.length > 0
      ? profile.expertise_tags
      : FALLBACK_TAGS;

  const photo = profile?.biography_photo_url ?? assetPath("0426e.png");
  const photoAlt = `${profile?.name ?? "Prof. Mohammad Noor Hidayat"} mengajar di ruang kuliah`;

  return (
    <section className="biography section-shell section-light" id="biografi">
      <div
        className="biography-image"
        onContextMenu={(e) => e.preventDefault()}
        onTouchStart={(e) => e.preventDefault()} // Mencegah sentuhan panjang
      >
        <img
          src={photo}
          alt={photoAlt}
          draggable={false}
          onDragStart={(e) => e.preventDefault()}
          style={{ pointerEvents: "none", userSelect: "none" }}
        />
      </div>

      <div className="biography-copy">
        <SectionHeading eyebrow={eyebrow} title={title} />

        {paragraphs.map((paragraph, index) => (
          <p key={index}>{paragraph}</p>
        ))}

        {qualifications.length > 0 && (
          <dl className="qualifications">
            {qualifications.map((item) => (
              <div key={item.degree}>
                <dt>{item.degree}</dt>
                <dd>{item.institution}</dd>
              </div>
            ))}
          </dl>
        )}

        {tags.length > 0 && (
          <ul className="tag-list" aria-label="Bidang keahlian">
            {tags.map((tag) => (
              <li key={tag}>{tag}</li>
            ))}
          </ul>
        )}
      </div>
    </section>
  );
}
