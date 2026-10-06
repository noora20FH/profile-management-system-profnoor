import "../css/app.css"

import { createInertiaApp } from "@inertiajs/react"
import type { ComponentType } from "react"
import { createRoot } from "react-dom/client"

const appName = import.meta.env.VITE_APP_NAME ?? "Academic Profile"

const pages = import.meta.glob<{ default: ComponentType }>("./Pages/**/*.tsx")

createInertiaApp({
  title: (title) => (title ? `${title} - ${appName}` : appName),
  resolve: async (name) => {
    const page = pages[`./Pages/${name}.tsx`]

    if (!page) {
      throw new Error(`Inertia page not found: ${name}`)
    }

    return (await page()).default
  },
  setup({ el, App, props }) {
    createRoot(el).render(<App {...props} />)
  },
  progress: {
    color: "#0D542B",
  },
})
