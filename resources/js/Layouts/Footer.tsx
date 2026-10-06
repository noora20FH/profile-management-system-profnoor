import { assetPath } from "@/utils/asset"

type FooterProps = {
  logo?: string
}

export default function Footer({ logo = assetPath("0c1a8.svg") }: FooterProps) {
  return (
    <footer className="footer section-shell">
      <div className="footer-grid">
        <div className="footer-identity">
          <div className="footer-brand">
            <img src={logo} alt="" />
            <strong>MNH</strong>
          </div>
          <p>
            Institut Teknologi Metropolitan Departemen Ilmu & Teknik Komputer
            Kantor: Blok 12, Lantai 4, Blok Inti Akademik
          </p>
          <a href="mailto:m.noorhidayat@mit.edu">
            m.noorhidayat@mit.edu · Telp: +60 3-1200 4560
          </a>
        </div>
        <div className="footer-links">
          <h3>Navigasi</h3>
          <a href="/#biografi">Biografi Dosen</a>
          <a href="/riset">Hibah Aktif</a>
          <a href="/mata-kuliah">Arsip Silabus</a>
          <a href="/pengabdian">Kegiatan Masyarakat</a>
        </div>
        <div className="footer-links">
          <h3>Profil Akademik</h3>
          <a href="/riset">Google Scholar</a>
          <a href="/riset">ResearchGate</a>
          <a href="/riset">ACM Digital Library</a>
          <a href="/#biografi">Halaman Lab MIT</a>
        </div>
        <div className="footer-consultation">
          <h3>Konsultasi Mingguan</h3>
          <div>
            <strong>Selasa & Kamis</strong>
            <b>14:00 - 16:00 ET</b>
            <p>Pesan konsultasi video atau jadwal untuk tinjauan tatap muka.</p>
          </div>
        </div>
      </div>
      <div className="footer-bottom">
        <p>© 2026 Prof. Mohammad Noor Hidayat. Hak Cipta Dilindungi.</p>
        <p>
          Institut Teknologi Metropolitan adalah institusi pendidikan dengan
          kesempatan yang setara.
        </p>
      </div>
    </footer>
  )
}
