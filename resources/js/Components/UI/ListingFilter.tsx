import {
  listingFilters,
  type ListingFilterValue,
  type ListingType,
} from "@/types/common"
import { listingPages } from "@/data/mocks"

type ListingFilterProps = {
  type: ListingType
  value: ListingFilterValue
  onChange: (value: ListingFilterValue) => void
}

export default function ListingFilter({
  type,
  value,
  onChange,
}: ListingFilterProps) {
  const config = listingPages[type]
  const labelFor = (year: ListingFilterValue) => {
    if (year === "all") return config.allLabel
    if (year === "previous") return config.previousLabel
    return year
  }

  return (
    <div className="listing-filter">
      <div className="filter-row">
        <label className="filter-select">
          {config.assets.filterIcon && (
            <img src={config.assets.filterIcon} alt="" />
          )}
          <span>{config.filterLabel}</span>
          <select
            aria-label="Filter berdasarkan tahun"
            onChange={(event) =>
              onChange(event.target.value as ListingFilterValue)
            }
            value={value}
          >
            {listingFilters.map((year) => (
              <option key={year} value={year}>
                {labelFor(year)}
              </option>
            ))}
          </select>
          <img src={config.assets.chevron} alt="" />
        </label>
        <div className="filter-chips" aria-label="Pilihan tahun">
          {listingFilters.map((year) => (
            <button
              className={value === year ? "active" : ""}
              key={year}
              onClick={() => onChange(year)}
              type="button"
            >
              {labelFor(year)}
            </button>
          ))}
        </div>
        <span className="filter-result">{config.resultLabel}</span>
      </div>
    </div>
  )
}
