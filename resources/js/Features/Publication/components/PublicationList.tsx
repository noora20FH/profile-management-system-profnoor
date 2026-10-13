import React from "react";

import { Publication } from "../types";
import PublicationCard from "./PublicationCard";


interface Props {
    publications:
    Publication[] |
    {
        data: Publication[];
    };
}


export default function PublicationList({
    publications
}: Props) {

    const items = Array.isArray(publications)
        ? publications
        : publications?.data ?? [];


    if(items.length === 0){

        return (
            <div className="publication-empty">
                Belum ada publikasi.
            </div>
        );

    }


    return (
        <>
            {
                items.map(publication => (
                    <PublicationCard
                        key={publication.id}
                        publication={publication}
                    />
                ))
            }
        </>
    );

}