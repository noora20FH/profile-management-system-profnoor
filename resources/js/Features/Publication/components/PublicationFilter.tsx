import React from "react";

type FilterValue =
  | "all"
  | "artikel_jurnal"
  | "artikel_prosiding"
  | "paten"
  | "hak_cipta"
  | "prototipe"
  | "ttg"
  | "buku";

interface Props {
  value: FilterValue;

  onChange: (value: FilterValue) => void;
}

const filters: { value: FilterValue; label: string }[] = [
  {
    value: "all",
    label: "Semua",
  },

  {
    value: "artikel_jurnal",
    label: "Artikel Jurnal",
  },

  {
    value: "artikel_prosiding",
    label: "Artikel Prosiding",
  },

  {
    value: "paten",
    label: "Paten",
  },

  {
    value: "hak_cipta",
    label: "Hak Cipta",
  },

  {
    value: "prototipe",
    label: "Prototipe",
  },

  {
    value: "ttg",
    label: "Teknologi Tepat Guna",
  },

  {
    value: "buku",
    label: "Buku",
  },
];

export default function PublicationFilter({ value, onChange }: Props) {
  return (
    <div className="publication-filter">
      {filters.map((item) => (
        <button
          key={item.value}
          type="button"
          className={value === item.value ? "active" : ""}
          onClick={() => onChange(item.value)}
        >
          {item.label}
        </button>
      ))}
    </div>
  );
}
