import type { ReactNode } from "react"

type PageLayoutProps = {
  children: ReactNode
  className?: string
}

export default function PageLayout({
  children,
  className = "page",
}: PageLayoutProps) {
  return <div className={className}>{children}</div>
}
