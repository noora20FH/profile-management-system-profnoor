import SectionHeading from "./SectionHeading";

import { assetPath } from "@/utils/asset";

const tags = [
  "Sistem Terdistribusi",
  "Komputasi Edge AI",
  "Pembelajaran Terfederasi",
  "Ketahanan Bizantium",
  "Kedaulatan Data",
];

export default function Biography() {
  return (
    <section className="biography section-shell section-light" id="biografi">
      <div className="biography-image">
        <img
          src={assetPath("0426e.png")}
          alt="Prof. Mohammad Noor Hidayat mengajar di ruang kuliah"
        />
      </div>
      <div className="biography-copy">
        <SectionHeading eyebrow="BIOGRAFI" title="Latar Belakang Akademik" />
        <p>
          Prof. Mohammad Noor Hidayat adalah Profesor Sistem Terdistribusi
          dengan jalur tenur di Institut Teknologi Metropolitan. Selama lebih
          dari 18 tahun, kelompok Penelitiannya berkarya di persimpangan antara
          model kecerdasan buatan berdimensi tinggi yang kompleks dan perangkat
          keras jaringan terdesentralisasi.
        </p>
        <p>
          Ia meraih gelar Ph.D. dalam Ilmu Komputer dari Universitas Cambridge
          dengan spesialisasi pada model eksekusi transaksional berkinerja
          tinggi. Ia merupakan penerima langsung berbagai penghargaan makalah
          internasional bergengsi dan saat ini bertugas dalam dewan penasihat
          komputasi global untuk standar jaringan generasi berikutnya.
        </p>
        <dl className="qualifications">
          <div>
            <dt>Ph.D. CS</dt>
            <dd>
              Universitas Cambridge (Divisi Spesialis Sistem Terdistribusi)
            </dd>
          </div>
          <div>
            <dt>M.Sc. Eng</dt>
            <dd>
              Universitas Teknik Nasional (Arsitektur Paralel Berkinerja Tinggi)
            </dd>
          </div>
        </dl>
        <ul className="tag-list" aria-label="Bidang keahlian">
          {tags.map((tag) => (
            <li key={tag}>{tag}</li>
          ))}
        </ul>
      </div>
    </section>
  );
}
