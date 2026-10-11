import React from "react";

import { Publication } from "../types";

import PublicationList from "./PublicationList";

interface Props {
  publications: Publication[];
}

export default function PublicationSection({ publications }: Props) {
  return (
    <section
      className="
            py-20
            "
    >
      <div
        className="
                max-w-7xl
                mx-auto
                px-6
                "
      >
        <div
          className="
                    mb-10
                    "
        >
          <h2
            className="
                        text-3xl
                        font-bold
                        text-gray-900
                        "
          >
            Publikasi
          </h2>

          <p
            className="
                        mt-3
                        text-gray-600
                        "
          >
            Kumpulan karya ilmiah, buku, prosiding, paten, prototipe, dan
            teknologi tepat guna.
          </p>
        </div>

        <PublicationList publications={publications} />
      </div>
    </section>
  );
}
