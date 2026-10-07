import type { ListingPageData } from "@/types/common";

const assets = "/assets/research";

export const researchPageConfig = {
  eyebrow: "DAFTAR PORTOFOLIO",

  title: "Portofolio Riset",

  description:
    "Hibah aktif, makalah fundamental, dan rekayasa sistem terapan berskala global.",

  allLabel: "Semua Riset",

  previousLabel: "Riset Sebelumnya",

  filterLabel: "Filter berdasarkan Tahun:",

  resultLabel: "Menampilkan Proyek Utama",

  landing: {
    eyebrow: "PORTOFOLIO RISET",
    title: "Bidang Aktif & Proyek Utama",
    ctaLabel: "Jelajahi Riset",
    featuredCount: 3,
  },


  assets:{
    chevron:`${assets}/b1399.svg`,
    arrow:`${assets}/7c1ef.svg`,
    logo:`${assets}/325dd.svg`,
    eyebrowIcon:`${assets}/4a311.svg`,
    divider:`${assets}/73368.svg`,
  }

} satisfies Omit<ListingPageData,"items">;