import React from "react";

import { Publication } from "../types";

interface Props {
  publication: Publication;
}

export default function PublicationCard({ publication }: Props) {
  return (
    <article
      className="
bg-white
rounded-2xl
shadow-sm
border
p-6
hover:shadow-lg
transition
"
    >
      {publication.thumbnail && (
        <img
          src={publication.thumbnail}
          alt={publication.title}
          className="
w-full
h-48
object-cover
rounded-xl
mb-5
"
        />
      )}

      {/* TYPE */}

      <div className="mb-3">
        <span
          className="
px-3
py-1
text-xs
rounded-full
bg-blue-100
text-blue-700
"
        >
          {publication.type_label}
        </span>
      </div>

      {/* TITLE */}

      <h3
        className="
text-xl
font-semibold
text-gray-900
mb-3
"
      >
        {publication.title}
      </h3>

      {/* RESEARCH PROJECT */}

      {publication.research_project && (
        <div
          className="
mb-3
text-sm
text-gray-600
"
        >
          <p className="font-medium">Research Project:</p>

          <p>{publication.research_project.title}</p>
        </div>
      )}

      {/* ABSTRACT */}

      {publication.abstract && (
        <p
          className="
text-gray-600
text-sm
line-clamp-4
mb-5
"
        >
          {publication.abstract}
        </p>
      )}

      <div
        className="
text-sm
space-y-2
mb-5
"
      >
        {/* DATE */}

        {publication.published_at && (
          <p>
            <strong>Tanggal Publish:</strong>{" "}
            {new Date(publication.published_at).toLocaleDateString("id-ID", {
              day: "numeric",
              month: "long",
              year: "numeric",
            })}
          </p>
        )}

        {/* DOI */}

        {publication.doi && (
          <p>
            <strong>DOI:</strong>{" "}
            <a
              href={`https://doi.org/${publication.doi}`}
              target="_blank"
              className="
text-blue-600
hover:underline
"
            >
              {publication.doi}
            </a>
          </p>
        )}
      </div>

      {/* LINK */}

      {publication.url && (
        <a
          href={publication.url}
          target="_blank"
          className="
text-green-600
hover:underline
text-sm
"
        >
          Lihat Publikasi
        </a>
      )}
    </article>
  );
}
