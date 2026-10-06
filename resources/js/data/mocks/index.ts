import { coursesMock } from "./courses.mock"
import { outreachMock } from "./outreach.mock"
import { researchMock } from "./research.mock"

import type { ListingType } from "@/types/common"

export { coursesMock, outreachMock, researchMock }
export { profileMetrics } from "./profile.mock"

export const listingPages = {
  research: researchMock,
  courses: coursesMock,
  outreach: outreachMock,
} satisfies Record<ListingType, typeof researchMock>
