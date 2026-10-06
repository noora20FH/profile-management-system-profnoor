import { usePage } from "@inertiajs/react"

import { researchMock } from "@/data/mocks"
import { getResearch } from "@/Features/Research/services/research.service"
import type { InertiaPageProps } from "@/types/common"

export default function useResearch() {
  return (
    usePage<InertiaPageProps>().props.research ?? getResearch() ?? researchMock
  )
}
