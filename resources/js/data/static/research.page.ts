import type { ListingPageData } from "@/types/common";

const assets = "/assets/research";

export const researchPageConfig = {
  eyebrow: "DAFTAR PORTOFOLIO",

  title: "Portofolio Penelitian",

  description:
    "Berfokus pada riset terapan dan fundamental di bidang energi terbarukan, sistem tenaga listrik, dan manajemen energi. Penelitian yang dijalankan tidak hanya bersifat teoretis, tetapi juga menghasilkan inovasi teknologi tepat guna, mulai dari pengembangan pembangkit listrik hingga sistem monitoring berbasis IoT.",

  allLabel: "Semua Penelitian",

  previousLabel: "Penelitian Sebelumnya",

  filterLabel: "Filter berdasarkan Tahun:",

  resultLabel: "Menampilkan Proyek Utama",

  landing: {
    eyebrow: "PORTOFOLIO PENELITIAN",
    title: "Bidang Aktif & Proyek Utama",
    ctaLabel: "Jelajahi Penelitian",
    featuredCount: 3,
  },

  assets: {
    chevron: `${assets}/b1399.svg`,
    arrow: `${assets}/7c1ef.svg`,
    logo: `${assets}/325dd.svg`,
    eyebrowIcon: `${assets}/4a311.svg`,
    divider: `${assets}/73368.svg`,
  },
} satisfies Omit<ListingPageData, "items">;
