import type { ListingPageData } from "@/types/common";


const assets="/assets/courses";


export const coursesPageConfig = {

 eyebrow:"PENAWARAN AKADEMIK",

 title:"Mata Kuliah",

 description:
 "Daftar mata kuliah akademik yang sedang tersedia.",


 allLabel:"Semua Mata Kuliah",

 previousLabel:"Mata Kuliah Sebelumnya",

 filterLabel:"Filter berdasarkan Tahun:",

 resultLabel:"Menampilkan Mata Kuliah",


 landing:{
    eyebrow:"MATA KULIAH YANG DIAMPU",
    title:"Penawaran Akademik Saat Ini",
    ctaLabel:"Lihat Semua Mata Kuliah",
    featuredCount:3
 },


 assets:{
    chevron:`${assets}/ee510.svg`,
    arrow:`${assets}/a93d8.svg`,
    logo:`${assets}/325dd.svg`
 }


} satisfies Omit<ListingPageData,"items">;