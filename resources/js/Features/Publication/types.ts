export type PublicationType =
    | "book"
    | "journal"
    | "proceeding"
    | "patent"
    | "prototype"
    | "ttg";


export interface ResearchProject {

    id: number;

    title: string;

}



export interface Publication {


    id: number;


    type: PublicationType;


    type_label: string;


    title: string;


    slug: string;


    abstract?: string | null;


    description?: string | null;


    authors?: string | null;


    publisher?: string | null;


    journal?: string | null;


    published_at?: string | null;


    doi?: string | null;


    url?: string | null;


    file_url?: string | null;


    thumbnail?: string | null;



    research_project?: ResearchProject | null;


}