import { usePage } from "@inertiajs/react"
import type { InertiaPageProps, ListingPageData } from "@/types/common"




export default function useCourses(): ListingPageData {

    const props =
        usePage<InertiaPageProps>().props


    const page =
        props.page ?? props.courses


    if (!page) {
        throw new Error(
            "Courses data is missing from Inertia props"
        )
    }


    return page
}