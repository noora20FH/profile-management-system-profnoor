import type {
  AnchorHTMLAttributes,
  ButtonHTMLAttributes,
  ReactNode,
} from "react"

type ButtonProps = {
  as?: "button"
} & ButtonHTMLAttributes<HTMLButtonElement> | {
  as: "a"
  href: string
} & AnchorHTMLAttributes<HTMLAnchorElement>

export default function Button({ children, ...props }: ButtonProps) {
  if (props.as === "a") {
    const { as: _as, ...anchorProps } = props
    return <a {...anchorProps}>{children}</a>
  }

  const { as: _as, ...buttonProps } = props
  return <button {...buttonProps}>{children as ReactNode}</button>
}
