import type { ListingPageData } from "@/types/common"

const assets = "/assets/courses"

export const coursesMock: ListingPageData = {
  eyebrow: "PENAWARAN AKADEMIK",
  title: "Mata Kuliah",
  description:
    "Jelajahi mata kuliah sistem terdistribusi, pembelajaran mesin, dan komputasi modern yang tersedia pada tahun akademik berjalan.",
  allLabel: "Semua Mata Kuliah",
  previousLabel: "Mata Kuliah Sebelumnya",
  filterLabel: "Filter berdasarkan Tahun:",
  resultLabel: "Menampilkan 6 Mata Kuliah",
  landing: {
    eyebrow: "MATA KULIAH YANG DIAMPU",
    title: "Penawaran Akademik Saat Ini",
    ctaLabel: "Lihat Semua Mata Kuliah",
    featuredCount: 3,
  },
  assets: {
    chevron: `${assets}/ee510.svg`,
    arrow: `${assets}/a93d8.svg`,
    logo: `${assets}/325dd.svg`,
  },
  items: [
    {
      id: "cs-501",
      year: "2026",
      image: `${assets}/4f9bf.png`,
      code: "CS-501",
      term: "Semester Ganjil 2026",
      title: "Sistem Terdistribusi Lanjutan",
      description:
        "Pendalaman tingkat pascasarjana tentang protokol konsensus, strategi replikasi, sinkronisasi waktu, dan arsitektur server berkinerja tinggi.",
    },
    {
      id: "cs-642",
      year: "2026",
      image: `${assets}/89849.png`,
      code: "CS-642",
      term: "Semester Genap 2026",
      title: "Pembelajaran Mesin dalam Produksi",
      description:
        "Rekayasa sistem praktis untuk meningkatkan skala alur kerja pembelajaran mendalam, telemetri model, pipeline pembelajaran terfederasi, dan akselerasi perangkat keras.",
    },
    {
      id: "cs-302",
      year: "2025",
      image: `${assets}/3b6fe.png`,
      code: "CS-302",
      term: "Semester Ganjil 2025",
      title: "Dasar-Dasar Sistem Konkuren",
      description:
        "Mata kuliah inti sarjana yang membahas keamanan thread, penghalang memori, struktur data bebas kunci, dan model eksekusi asinkron modern.",
    },
    {
      id: "cs-412",
      year: "2025",
      image: `${assets}/efece.png`,
      code: "CS-412",
      term: "Semester Genap 2025",
      title: "Basis Data Terdistribusi & Konsensus",
      description:
        "Toleransi kegagalan Bizantium, Paxos, Raft, jaminan konsistensi, dan sistem penyimpanan berskala global dengan volume transaksi tinggi.",
    },
    {
      id: "cs-581",
      year: "2024",
      image: `${assets}/5bfd9.png`,
      code: "CS-581",
      term: "Semester Ganjil 2024",
      title: "Pembelajaran Terfederasi & Privasi",
      description:
        "Topologi komputasi edge, agregasi aman, enkripsi homomorfik, dan optimalisasi model terdesentralisasi tanpa memusatkan data mentah.",
    },
    {
      id: "cs-201",
      year: "2024",
      image: `${assets}/f3566.png`,
      code: "CS-201",
      term: "Semester Genap 2024",
      title: "Pemrograman Sistem",
      description:
        "Manajemen memori, bahasa rakitan, konkurensi dasar, API POSIX, dan debugging tingkat sistem pada lingkungan Unix modern.",
    },
  ],
}
