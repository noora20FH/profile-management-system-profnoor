import { usePage } from "@inertiajs/react"
import type { InertiaPageProps, ListingPageData } from "@/types/common"


export default function useResearch(): ListingPageData {

    const props =
        usePage<InertiaPageProps>().props


    const page =
        props.page ?? props.research


    if (!page) {
        throw new Error(
            "Research data is missing from Inertia props"
        )
    }


    return page
}