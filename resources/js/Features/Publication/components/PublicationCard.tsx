import React from "react";

import {
    Publication
} from "../types";



interface Props {

    publication: Publication;

}



export default function PublicationCard({

    publication

}: Props) {


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


            {
                publication.thumbnail && (

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

                )
            }



            <div
                className="
                flex
                items-center
                gap-2
                mb-3
                "
            >

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



            {
                publication.authors && (

                    <p
                        className="
                        text-sm
                        text-gray-600
                        mb-2
                        "
                    >

                        Penulis:
                        {" "}
                        {publication.authors}

                    </p>

                )
            }



            {
                publication.abstract && (

                    <p
                        className="
                        text-gray-600
                        text-sm
                        line-clamp-3
                        mb-5
                        "
                    >

                        {publication.abstract}

                    </p>

                )
            }



            <div
                className="
                flex
                gap-3
                "
            >


                {
                    publication.file_url && (

                        <a
                            href={publication.file_url}
                            target="_blank"
                            className="
                            text-sm
                            text-blue-600
                            hover:underline
                            "
                        >

                            Lihat File

                        </a>

                    )
                }



                {
                    publication.url && (

                        <a
                            href={publication.url}
                            target="_blank"
                            className="
                            text-sm
                            text-green-600
                            hover:underline
                            "
                        >

                            Link

                        </a>

                    )
                }


            </div>



        </article>

    );

}