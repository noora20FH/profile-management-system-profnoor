import { usePage } from "@inertiajs/react"

import { listingPages } from "@/data/mocks"
import type {
  InertiaPageProps,
  ListingPageData,
  ListingType,
} from "@/types/common"

export default function useListingPage(type: ListingType): ListingPageData {
  const props = usePage<InertiaPageProps>().props
  return props.page ?? props[type] ?? listingPages[type]
}
