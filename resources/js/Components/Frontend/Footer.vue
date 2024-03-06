<template>
    <div
        class="grid grid-cols-8 px-8 py-2 text-white bg-pink-900 sm:grid-cols-9 lg:grid-cols-8 sm:p-14 font-karla"
    >
        <!-- Dibuat oleh -->
        <div class="col-span-8 ml-2 sm:col-span-9 lg:col-span-2">
            <a href="https://laporgub.jatengprov.go.id">
                <div class="flex my-3">
                    <span
                        class="self-center text-xl font-semibold text-white whitespace-nowrap dark:text-white"
                    >
                        Lapor
                    </span>
                    <span
                        class="self-center text-xl font-semibold text-black whitespace-nowrap dark:text-white"
                    >
                        Kab!
                    </span>
                </div>
            </a>
        </div>

        <!-- Kanal Aduan -->
        <div class="col-span-8 ml-2 sm:col-span-3 lg:col-span-2">
            <p class="mt-6 font-bold text-l">KANAL ADUAN</p>
            <div class="col-span-1">
                <a :href="footerData.facebook.link_url" target="_blank">
                    <div class="flex my-3">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="inline-block w-4"
                            fill="#ffff"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 448 512"
                        >
                            <!-- Font Awesome Pro 6.1.1 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"
                            ></path>
                        </svg>
                    </div>
                </a>
                <a :href="footerData.instagram.link_url" target="_blank">
                    
                </a>
            </div>
        </div>
    </div>
</template>
