
import { defineConfig } from "cypress";

export default defineConfig({
  e2e: {
    baseUrl:
      (globalThis as typeof globalThis & {
        process?: { env?: Record<string, string | undefined> };
      }).process?.env?.CYPRESS_BASE_URL ??
      "http://127.0.0.1:8000",

    specPattern:
      "cypress/e2e/**/*.cy.{js,jsx,ts,tsx}",

    supportFile: "cypress/support/e2e.js",

    viewportWidth: 1365,
    viewportHeight: 900,

    defaultCommandTimeout: 8000,
    pageLoadTimeout: 30000,

    retries: {
      runMode: 1,
      openMode: 0,
    },

    screenshotOnRunFailure: true,
    video: true,
  },
});
