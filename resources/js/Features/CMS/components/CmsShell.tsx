import type { ReactNode } from "react"

type CmsShellProps = {
  children: ReactNode
}

export default function CmsShell({ children }: CmsShellProps) {
  return <div>{children}</div>
}
