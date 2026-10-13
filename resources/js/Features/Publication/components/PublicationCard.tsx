import React from "react";

import { Publication } from "../types";

interface Props {
  publication: Publication;
}

export default function PublicationCard({ publication }: Props) {
  return (
    <article className="publication-card">

      {publication.thumbnail && (
        <img
          src={publication.thumbnail}
          alt={publication.title}
        />
      )}

      <div className="publication-card-body">

        {/* TYPE */}
        <div>
          <span className="publication-type">
            {publication.type_label}
          </span>
        </div>


        {/* TITLE */}
        <h3>
          {publication.title}
        </h3>


        {/* RESEARCH PROJECT */}
        {publication.research_project && (
          <div className="publication-meta">
            <p>
              Research Project:
            </p>

            <span>
              {publication.research_project.title}
            </span>
          </div>
        )}


        {/* ABSTRACT */}
        {publication.abstract && (
          <p>
            {publication.abstract}
          </p>
        )}


        {/* DATE */}
        {publication.published_at && (
          <small>
            {new Date(publication.published_at)
              .toLocaleDateString("id-ID", {
                day: "numeric",
                month: "long",
                year: "numeric",
              })}
          </small>
        )}


        {/* LINK */}
        {publication.url && (
          <a href={publication.url} target="_blank">
            Baca Publikasi Lengkap →
          </a>
        )}

      </div>

    </article>
  );
}