import type { ListingPageData } from "@/types/common";


const assets="/assets/outreach";


export const outreachPageConfig={


 eyebrow:"DAMPAK SOSIAL",

 title:"Pengabdian Masyarakat",


 description:
 "Program pengabdian masyarakat dan kontribusi sosial akademik.",


 allLabel:"Semua Program",

 previousLabel:"Pengabdian Sebelumnya",

 filterLabel:"Filter berdasarkan Tahun:",

 resultLabel:"Menampilkan Program Pengabdian",



 landing:{
    eyebrow:"DAMPAK SOSIAL",
    title:"Inisiatif Pengabdian Masyarakat",
    ctaLabel:"Jelajahi Pengabdian",
    featuredCount:2
 },


 assets:{
    chevron:`${assets}/1de68.svg`,
    arrow:`${assets}/5b584.svg`,
    logo:`${assets}/325dd.svg`,
    filterIcon:`${assets}/fd094.svg`,
    primaryMetricIcon:`${assets}/273d5.svg`,
    secondaryMetricIcon:`${assets}/4b034.svg`
 }


} satisfies Omit<ListingPageData,"items">;