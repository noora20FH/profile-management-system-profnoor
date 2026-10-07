import { usePage } from "@inertiajs/react";

import type {
 ListingPageData,
 ListingType
} from "@/types/common";


export default function useListingPage(
 type:ListingType
):ListingPageData {


 const {
 props
 } =
 usePage<any>();


 const page =
 props.page ??
 props[type];


 if(!page){

    throw new Error(
      `Missing listing data for ${type}`
    );

 }


 return page;

}