import { assetPath } from "@/utils/asset";

type FooterProps = {
  logo?: string;
};

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
            Jurusan Teknik Elektro, Politeknik Negeri Malang (Polinema). Kampus
            Utama: Jl. Soekarno Hatta No. 9, Malang, Jawa Timur, Indonesia.
          </p>
          <a href="mailto:moh.noor@polinema.ac.id">moh.noor@polinema.ac.id</a>
        </div>
        <div className="footer-links">
          <h3>Navigasi</h3>
          <a href="/#biografi">Biografi Dosen</a>
          <a href="/penelitian">Proyek Penelitian</a>
          <a href="/mata-kuliah">Pengajaran</a>
          <a href="/pengabdian">Pengabdian Masyarakat</a>
          <a href="/rekam-jejak">Rekam Jejak</a>
        </div>
        <div className="footer-links">
          <h3>Profil Akademik</h3>
          <a
            href="https://sinta.kemdiktisaintek.go.id/authors/profile/6007837"
            target="_blank"
            rel="noopener noreferrer"
          >
            SINTA Kemdiktisaintek
          </a>
          <a
            href="https://scholar.google.com/"
            target="_blank"
            rel="noopener noreferrer"
          >
            Google Scholar
          </a>
          <a
            href="https://www.scopus.com/"
            target="_blank"
            rel="noopener noreferrer"
          >
            Scopus
          </a>
          <a href="/#biografi">Profil Polinema</a>
        </div>
        <div className="footer-consultation">
          <h3>Konsultasi Akademik</h3>
          <div>
            <strong>Senin & Rabu</strong>
            <b>09:00 - 15:00 WIB</b>
            <p>
              Silakan hubungi melalui email untuk penjadwalan bimbingan atau
              konsultasi riset.
            </p>
          </div>
        </div>
      </div>
      <div className="footer-bottom">
        <p>
          © 2026 Prof. Ir. Mohammad Noor Hidayat, S.T., M.Sc., Ph.D. Hak Cipta
          Dilindungi.
        </p>
        <p>
          Politeknik Negeri Malang adalah institusi pendidikan vokasi yang
          berkomitmen pada keunggulan akademik.
        </p>
      </div>
    </footer>
  );
}
