import { http } from "@/services/http"

export const apiClient = {
  get<T,>(path: string) {
    return http<T>(path)
  },
}
