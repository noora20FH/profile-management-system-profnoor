import type { ListingPageData } from "@/types/common"

const assets = "/assets/outreach"

export const outreachMock: ListingPageData = {
  eyebrow: "DAMPAK SOSIAL",
  title: "Pengabdian Masyarakat",
  description:
    "Menjembatani arsitektur teknis sistem terdistribusi dengan pemberdayaan masyarakat regional. Menggali penerapan praktis jaringan komputasi untuk menjamin kesetaraan ekologis, pertanian, dan pendidikan.",
  allLabel: "Semua Program",
  previousLabel: "Pengabdian Sebelumnya",
  filterLabel: "Filter berdasarkan Tahun:",
  resultLabel: "Menampilkan 6 Program Pengabdian",
  landing: {
    eyebrow: "DAMPAK SOSIAL",
    title: "Inisiatif Pengabdian Masyarakat",
    ctaLabel: "Jelajahi Pengabdian",
    featuredCount: 2,
  },
  assets: {
    chevron: `${assets}/1de68.svg`,
    arrow: `${assets}/5b584.svg`,
    logo: `${assets}/325dd.svg`,
    filterIcon: `${assets}/fd094.svg`,
    primaryMetricIcon: `${assets}/273d5.svg`,
    secondaryMetricIcon: `${assets}/4b034.svg`,
  },
  items: [
    {
      id: "rural-ai-literacy",
      year: "2026",
      image: `${assets}/8ba2f.png`,
      category: "Inisiatif Pengabdian Regional",
      title: "Program Literasi AI Pedesaan",
      description:
        "Lokakarya keliling swadana yang menghadirkan kurikulum literasi digital luring dan perangkat keras komputer fisik ke sekolah menengah dengan sumber daya terbatas.",
      metrics: ["1,200+ Siswa", "18 Sekolah"],
    },
    {
      id: "public-data-ethics",
      year: "2025",
      image: `${assets}/612e8.png`,
      category: "Dewan Penasihat Pemerintah",
      title: "Konsultasi Publik tentang Etika Data",
      description:
        "Memberikan masukan kepada panel kementerian dan pemerintah regional mengenai standar yang aman dan menjaga privasi untuk menerapkan AI dalam sistem portal warga tingkat kota.",
      metrics: ["3 Kebijakan Disusun", "5 Municipalities"],
    },
    {
      id: "forest-telemetry",
      year: "2025",
      image: `${assets}/9cbc8.png`,
      title: "Pengabdian Telemetri Hutan",
      description:
        "Berkolaborasi dengan kelompok pelestari satwa liar setempat untuk menempatkan sensor akustik bertenaga surya yang dirancang guna mengidentifikasi kegiatan pembalakan liar secara waktu nyata.",
      metrics: ["42 Sensor Ditempatkan", "2 Taman Nasional"],
    },
    {
      id: "open-decentralized-computing",
      year: "2024",
      image: `${assets}/d4e4a.png`,
      title: "Inisiatif Komputasi Terdesentralisasi Sumber Terbuka",
      description:
        "Memberdayakan universitas regional dengan infrastruktur komputasi peer-to-peer untuk menjalankan simulasi iklim berskala besar tanpa menyewa node cloud yang mahal.",
      metrics: ["12 Lab Mitra", "150+ Peneliti"],
    },
    {
      id: "junior-cse-hackathon",
      year: "2023",
      image: `${assets}/4945f.png`,
      title: "Hackathon CSE Junior",
      description:
        "Kompetisi tahunan sepanjang akhir pekan bagi pemrogram muda yang menyediakan bimbingan gratis dari kandidat PhD Metropolitan dan sponsor industri.",
      metrics: ["350+ Peserta", "24 Mentor"],
    },
    {
      id: "cooperative-digital-sovereignty",
      year: "previous",
      title: "Kedaulatan Digital untuk Koperasi",
      description:
        "Merancang kerangka buku besar yang aman bagi koperasi pertanian independen untuk melacak logistik rantai pasok dan melewati perantara monopolistik yang tersentralisasi.",
      metrics: ["5 Koperasi", "8,000+ Farm Units"],
    },
  ],
}
