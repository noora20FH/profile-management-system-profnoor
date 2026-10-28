describe("API Contract - /api/media", () => {
  it("mengembalikan JSON dengan array data", () => {
    cy.request({
      method: "GET",
      url: "/api/media",
      headers: { Accept: "application/json" },
    }).then((response) => {
      expect(response.status).to.equal(200);
      expect(response.headers["content-type"]).to.match(/^application\/json/);
      expect(response.body).to.have.property("data").that.is.an("array");
    });
  });

  it("setiap item media punya field minimum yang stabil", () => {
    cy.request({
      method: "GET",
      url: "/api/media",
      headers: { Accept: "application/json" },
    }).then((response) => {
      // Jika array kosong, tidak ada yang bisa diverifikasi — itu OK,
      // jangan buat test gagal hanya karena DB media kosong.
      if (response.body.data.length === 0) {
        cy.log("Tidak ada media — skip bentuk item");
        return;
      }
      response.body.data.forEach((item) => {
        expect(item).to.be.an("object");
        // Sesuaikan dengan bentuk aktual MediaResource
        expect(item).to.have.property("id");
        expect(item).to.have.property("url").that.is.a("string");
      });
    });
  });
});

describe("API Contract - /api/consultations (validasi, tanpa menulis DB)", () => {
  const URL = "/api/consultations";

  function postConsultation(body) {
    return cy.request({
      method: "POST",
      url: URL,
      headers: { Accept: "application/json" },
      failOnStatusCode: false,
      body,
    });
  }

  // Guard: pastikan request invalid TIDAK menambah baris di DB.
  // Cypress tidak punya akses DB; sebagai gantinya, kita hanya menguji
  // jalur yang pasti ditolak validasi (tidak sampai ke ConsultationService).
  it("menolak name kosong + email tidak valid dengan 422", () => {
    postConsultation({ name: "", email: "bukan-format-email" }).then((res) => {
      expect(res.status).to.equal(422);
      expect(res.headers["content-type"]).to.match(/^application\/json/);
      expect(res.body).to.have.property("errors");
      expect(res.body.errors).to.have.property("name");
      expect(res.body.errors).to.have.property("email");
      // Pastikan pesan error memang menyebut aturan yang diharapkan
      expect(res.body.errors.name[0]).to.match(/required/i);
      expect(res.body.errors.email[0]).to.match(/valid|email/i);
    });
  });

  it("menolak name yang melebihi 255 karakter", () => {
    postConsultation({
      name: "a".repeat(256),
      email: "valid@example.com",
    }).then((res) => {
      expect(res.status).to.equal(422);
      expect(res.body.errors).to.have.property("name");
    });
  });

  it("menolak preferred_at di masa lalu", () => {
    postConsultation({
      name: "Budi",
      email: "budi@example.com",
      preferred_at: "2000-01-01T00:00:00Z",
    }).then((res) => {
      expect(res.status).to.equal(422);
      expect(res.body.errors).to.have.property("preferred_at");
    });
  });

  it("menolak preferred_at yang bukan tanggal", () => {
    postConsultation({
      name: "Budi",
      email: "budi@example.com",
      preferred_at: "besok pagi",
    }).then((res) => {
      expect(res.status).to.equal(422);
      expect(res.body.errors).to.have.property("preferred_at");
    });
  });

  // Jalur "happy path" sengaja TIDAK diuji di sini:
  // - Akan menulis ke tabel consultations
  // - Membutuhkan DB test + cleanup eksplisit
  // - Bukan prioritas untuk website profil
});

describe("Hero - CTA Konsultasi", () => {
  it("tombol 'Hubungi Saya' membuka Gmail compose dengan email tujuan", () => {
    cy.visit("/");

    cy.contains("a.button--outline", /Hubungi|Konsultasi/i)
      .should("have.attr", "href")
      .and("match", /^https:\/\/mail\.google\.com\/mail\/\?view=cm/)
      .and("include", "to=")
      .and("include", "su=");
  });

  it("email tujuan di URL compose berasal dari data profil", () => {
    cy.visit("/");
    cy.inertiaProps().then((props) => {
      const email = props.profile?.email ?? "moh.noor@polinema.ac.id";
      cy.contains("a.button--outline", /Hubungi|Konsultasi/i)
        .invoke("attr", "href")
        .should("include", encodeURIComponent(email));
    });
  });
});