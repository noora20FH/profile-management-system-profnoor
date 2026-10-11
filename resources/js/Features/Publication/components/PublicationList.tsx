import React from "react";

import {
    Publication
} from "../types";


import PublicationCard
from "./PublicationCard";



interface Props {

    publications:
    Publication[] |
    {
        data: Publication[];
    };

}



export default function PublicationList({

    publications

}: Props){


    const items = Array.isArray(publications)

        ? publications

        : publications?.data ?? [];



    if(items.length === 0){

        return (

            <div
                className="
                text-center
                py-10
                text-gray-500
                "
            >
                Belum ada publikasi.
            </div>

        );

    }



    return (

        <div
            className="
            grid
            md:grid-cols-2
            lg:grid-cols-3
            gap-6
            "
        >

            {
                items.map(

                    publication => (

                        <PublicationCard

                            key={
                                publication.id
                            }

                            publication={
                                publication
                            }

                        />

                    )

                )
            }

        </div>

    );

}