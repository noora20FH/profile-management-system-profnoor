import type { ListingPageData } from "@/types/common"

const assets = "/assets/research"

export const researchMock: ListingPageData = {
  eyebrow: "DAFTAR PORTOFOLIO",
  title: "Portofolio Riset",
  description:
    "Hibah aktif, makalah fundamental, dan rekayasa sistem terapan berskala global. Telusuri lebih dari satu dekade inovasi komputasi terdesentralisasi.",
  allLabel: "Semua Riset",
  previousLabel: "Riset Sebelumnya",
  filterLabel: "Filter berdasarkan Tahun:",
  resultLabel: "Menampilkan 6 Proyek Utama",
  landing: {
    eyebrow: "PORTOFOLIO RISET",
    title: "Bidang Aktif & Proyek Utama",
    ctaLabel: "Jelajahi Riset",
    featuredCount: 3,
  },
  assets: {
    chevron: `${assets}/b1399.svg`,
    arrow: `${assets}/7c1ef.svg`,
    logo: `${assets}/325dd.svg`,
    eyebrowIcon: `${assets}/4a311.svg`,
    divider: `${assets}/73368.svg`,
  },
  items: [
    {
      id: "federated-edge-privacy",
      year: "2026",
      image: `${assets}/a54e6.png`,
      title:
        "Pembelajaran Terfederasi yang Menjaga Privasi pada Perangkat Edge",
      description:
        "Mengkaji model pembelajaran mendalam terdesentralisasi di seluruh node edge yang aman untuk meminimalkan beban komunikasi dan menjamin kedaulatan data klinis.",
      meta: "Yayasan Sains Nasional ($1.2M)",
    },
    {
      id: "byzantine-transactional-database",
      year: "2025",
      image: `${assets}/57d8a.png`,
      title:
        "Basis Data Transaksional yang Tangguh terhadap Kegagalan Bizantium",
      description:
        "Mengembangkan protokol konsensus generasi berikutnya yang toleran terhadap kegagalan dan mampu menjaga konsistensi transaksional saat terjadi partisi multipoint berbahaya.",
      meta: "Publikasi IEEE Transactions on Computers",
    },
    {
      id: "acoustic-edge-telemetry",
      year: "2025",
      image: `${assets}/3f066.png`,
      title: "Telemetri Akustik Edge untuk Deteksi Pembalakan Liar",
      description:
        "Menempatkan rangkaian mikrokomputer hemat baterai di hutan hujan lindung untuk memproses telemetri bioakustik secara waktu nyata guna mendeteksi ancaman lokal pada lanskap suara.",
      meta: "Kolaborasi dengan World Wildlife Fund",
    },
    {
      id: "secure-iot-multicast",
      year: "2024",
      image: `${assets}/a6df3.png`,
      title: "Multicast Aman Berkinerja Tinggi dalam Kawanan IoT",
      description:
        "Menciptakan arsitektur pertukaran kunci untuk komunikasi multicast tanpa kepercayaan melalui perangkat edge taktis dan terhubung satelit dengan bandwidth rendah.",
      meta: "Hibah Riset EU Horizon",
    },
    {
      id: "federated-health-zero-knowledge",
      year: "2024",
      image: `${assets}/677c5.png`,
      title: "Kedaulatan Tanpa Pengetahuan dalam Layanan Kesehatan Terfederasi",
      description:
        "Merumuskan primitif kriptografi yang memungkinkan audit medis publik secara aman tanpa mengungkapkan diagnosis pasien pada tingkat baris.",
      meta: "Hibah Informatika Kesehatan MIT",
    },
    {
      id: "global-network-simulation",
      year: "2023",
      image: `${assets}/007c0.png`,
      title: "Kerangka Simulasi Jaringan Berskala Global",
      description:
        "Kerangka kerja yang memodelkan variasi perutean tingkat milidetik dalam simulasi kegagalan kabel lintas benua yang bersifat katastrofik.",
      meta: "Penerbit Akademik Metropolitan",
    },
  ],
}
