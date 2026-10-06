import { usePage } from "@inertiajs/react"

import { outreachMock } from "@/data/mocks"
import type { InertiaPageProps } from "@/types/common"

export default function useOutreach() {
  return usePage<InertiaPageProps>().props.outreach ?? outreachMock
}
