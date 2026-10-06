type SectionHeadingProps = {
  eyebrow: string
  title: string
  light?: boolean
}

export default function SectionHeading({
  eyebrow,
  title,
  light = false,
}: SectionHeadingProps) {
  return (
    <div className={`section-heading${light ? " section-heading--light" : ""}`}>
      <p className="section-eyebrow">{eyebrow}</p>
      <h2>{title}</h2>
    </div>
  )
}
