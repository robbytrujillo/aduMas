<template>
    <Head :title="aduan.title" />
    <div class="container flex mx-auto lg:pt-28">
        <div class="grid grid-cols-3 sm:min-h-fit lg:space-y-0 sm:space-x-4">
            <!-- Section Detail Aduan -->
            <div class="col-span-3 mb-6 lg:col-span-2 sm:col-span-3 lg:pr-2">
                <div class="bg-white shadow">
                    <!-- header card -->
                    <div class="grid grid-cols-2 p-4 border-b border-slate-200">
                        <div class="col-span-1">
                            <p class="text-base font-semibold">
                                Rincian Aduan :
                                <span class="text-red-600">
                                    LK {{ aduan.id }}
                                </span>
                            </p>
                            <p class="text-base font-semibold">
                                Rincian Aduan :
                                <span class="text-red-600">
                                    LK {{ aduan.title }}
                                </span>
                            </p>
                        </div>
                        <div class="col-span-1 justify-self-end">
                            <span class="px-2 py-1 text-red-600 border rounded-full" style="">
                                
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
