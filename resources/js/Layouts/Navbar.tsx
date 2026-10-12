import { useState } from "react";

import type { ListingType } from "@/types/common";

type NavbarProps = {
  active?: ListingType;
};

export default function Navbar({ active }: NavbarProps) {
  const [menuOpen, setMenuOpen] = useState(false);

  return (
    <header className={`site-header${menuOpen ? " menu-open" : ""}`}>
      <a className="brand" href="/" aria-label="Kembali ke beranda">
        <span className="brand-name">Prof. Mohammad Noor Hidayat</span>
      </a>
      <nav className="primary-nav" aria-label="Navigasi utama">
        <a href="/#biografi">Biografi</a>
        <a className={active === "courses" ? "active" : ""} href="/mata-kuliah">
          Pengajaran
        </a>
        <a className={active === "research" ? "active" : ""} href="/riset">
          Riset
        </a>

        <a className={active === "outreach" ? "active" : ""} href="/pengabdian">
          Pengabdian
        </a>
        <a
          href="/publikasi"
          className={active === "publication" ? "active" : ""}
        >
          Publikasi
        </a>
      </nav>
      <button
        aria-controls="mobile-navigation"
        aria-expanded={menuOpen}
        aria-label={menuOpen ? "Tutup menu navigasi" : "Buka menu navigasi"}
        className="menu-toggle"
        onClick={() => setMenuOpen((isOpen) => !isOpen)}
        type="button"
      >
        <span />
        <span />
        <span />
      </button>
      <nav
        aria-label="Navigasi tablet dan smartphone"
        className={`mobile-nav${menuOpen ? " open" : ""}`}
        id="mobile-navigation"
      >
        <a href="/#biografi" onClick={() => setMenuOpen(false)}>
          Biografi
        </a>
        <a
          className={active === "courses" ? "active" : ""}
          href="/mata-kuliah"
          onClick={() => setMenuOpen(false)}
        >
          Pengajaran
        </a>
        <a
          className={active === "research" ? "active" : ""}
          href="/riset"
          onClick={() => setMenuOpen(false)}
        >
          Riset
        </a>
        
        <a
          className={active === "outreach" ? "active" : ""}
          href="/pengabdian"
          onClick={() => setMenuOpen(false)}
        >
          Pengabdian
        </a>
        <a
          href="/publikasi"
          className={active === "publication" ? "active" : ""}
        >
          Publikasi
        </a>
      </nav>
    </header>
  );
}
