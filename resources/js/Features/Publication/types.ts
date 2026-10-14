export type PublicationType =
    | "artikel_jurnal"
    | "artikel_prosiding"
    | "paten"
    | "hak_cipta"
    | "prototipe"
    | "ttg"
    | "buku";


export interface ResearchProject {
    id:number;
    title:string;
}


export interface Publication {

    id:number;

    year?:string|null;

    type:PublicationType;

    type_label:string;

    title:string;

    slug:string;

    abstract?:string|null;

    published_at?:string|null;

    doi?:string|null;

    url?:string|null;

    video_url?:string|null;

    thumbnail?:string|null;

    research_project?:ResearchProject|null;

}