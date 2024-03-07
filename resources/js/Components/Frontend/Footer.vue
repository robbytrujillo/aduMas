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
                    <div class="flex my-3">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="inline-block w-4"
                            fill="#ffff"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 448 512"
                        >
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                            ></path>
                        </svg>
                        <p class="ml-2 text-xs">
                            {{ footerData.instagram.nama_halaman }}
                        </p>
                    </div>
                </a>
                <a :href="footerData.twitter.link_url" target="_blank">
                    <div class="flex my-3">
                        <svg
                            class="inline-block w-5"
                            fill="#ffff"
                            stroke="currentColor"
                            version="1.1"
                            id="svg5"
                            xmlns:svg="http://www.w3.org/2000/svg"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px"
                            y="0px"
                            viewBox="0 0 1668.56 1221.19"
                            style="
                                enable-background: new 0 0 1668.56;
                                margin-left: -0.15rem;
                            "
                            xml:space="preserve"
                        >
                            <g
                                id="layer1"
                                transform="translate(52.390088,-25.058597)"
                            >
                                <path
                                    id="path1009"
                                    d="M283.94,167.31l386.39,516.64L281.5,1104h87.51l340.42-367.76L984.48,1104h297.8L874.15,558.3l361.92-390.99
                                        h-87.51l-313.51,338.7l-253.31-338.7H283.94z M412.63,231.77h136.81l604.13,807.76h-136.81L412.63,231.77z"
                                ></path>
                            </g>
                        </svg>
                        <p class="ml-1 text-xs">
                            {{ footerData.twitter.nama_halaman }}
                        </p>
                    </div>
                </a>
                <a :href="footerData.whatsapp.link_url" target="_blank">
                    <div class="flex my-3">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="inline-block w-4"
                            fill="#ffff"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 448 512"
                        >
                            <path
                                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                            ></path>
                        </svg>
                        <p class="ml-2 text-xs">{{ footerData.whatsapp.nama_halaman }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Kontak Kami -->
    <div class="col-span-8 ml-2 sm:col-span-3 lg:col-span-2">
        
    </div>
</template>
