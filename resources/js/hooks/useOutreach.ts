import { usePage } from "@inertiajs/react"
import type { InertiaPageProps, ListingPageData } from "@/types/common"




export default function useOutreach(): ListingPageData {

    const props =
        usePage<InertiaPageProps>().props


    const page =
        props.page ?? props.outreach


    if (!page) {
        throw new Error(
            "Outreach data is missing from Inertia props"
        )
    }


    return page
}