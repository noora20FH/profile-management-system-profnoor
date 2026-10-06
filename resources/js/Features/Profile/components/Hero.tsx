import { usePage } from "@inertiajs/react"

import Navbar from "@/Layouts/Navbar"
import { profileMetrics } from "@/data/mocks"
import type { InertiaPageProps } from "@/types/common"
import { assetPath } from "@/utils/asset"

export default function Hero() {
  const metrics =
    usePage<InertiaPageProps>().props.profileMetrics ?? profileMetrics

  return (
    <>
      <div className="hero-shell" id="beranda">
        <Navbar />
        <main className="hero section-shell">
          <div className="hero-copy">
            <div className="hero-title-block">
              <p className="status-pill">
                <span aria-hidden="true" />
                KETUA ILMU & TEKNIK KOMPUTER
              </p>
              <h1>Prof. Mohammad Noor Hidayat</h1>
              <p className="hero-description">
                Merintis sistem AI terdistribusi, kerangka komputasi edge
                terfederasi yang aman, dan solusi jaringan tangguh berskala
                global. Berdedikasi untuk mendidik generasi penerus akademisi
                komputasi dan mengubah teknologi mentah menjadi manfaat bagi
                komunitas global.
              </p>
            </div>
            <div className="button-row">
              <a className="button button--primary" href="/riset">
                Lihat Daftar Riset
              </a>
              <a
                className="button button--outline"
                href="mailto:m.noorhidayat@mit.edu"
              >
                Hubungi Saya
              </a>
            </div>
          </div>
          <div className="hero-portrait">
            <img
              src={assetPath("2e406.png")}
              alt="Prof. Mohammad Noor Hidayat"
            />
          </div>
        </main>
      </div>

      <section
        className="metrics section-shell"
        aria-label="Pencapaian akademik"
      >
        {metrics.map((metric) => (
          <article className="metric-card" key={metric.label}>
            <strong>{metric.value}</strong>
            <h3>{metric.label}</h3>
            <p>{metric.detail}</p>
          </article>
        ))}
      </section>
    </>
  )
}
