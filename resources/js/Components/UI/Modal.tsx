import type { ReactNode } from "react"

type ModalProps = {
  children: ReactNode
  open: boolean
}

export default function Modal({ children, open }: ModalProps) {
  if (!open) return null
  return <div role="dialog">{children}</div>
}
