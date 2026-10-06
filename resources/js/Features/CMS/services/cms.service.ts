import { apiClient } from "@/services/api/client"

export function getCmsContent<T>() {
  return apiClient.get<T>("/admin/content")
}
