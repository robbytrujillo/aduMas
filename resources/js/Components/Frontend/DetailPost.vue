<template>
    <Head :title="post.title" />
    <aside
        id="blogs"
        aria-label="Related articles"
        class="py-8 bg-white lg:py-24 dark:bg-gray-900"
    >
        <section class="pb-1 pt-347.5">
            <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
                <div class="flex flex-wrap gap-7.5">
                    <div class="xl-max-w-[770px] w-full mr-7">
                        <img
                            :src="post.image"
                            alt="blog"
                            class="w-full mb-10"
                        />
                        <h1
                            class="font-bold text-2xl sm:text-4xl lg:text-custom-2 text-dark mb-5.5"
                        >
                            {{ post.title }}
                        </h1>

                        <div
                            class="flex flex-col gap-3 sm:flex-row sm:items-center"
                        >
                            <div class="flex flex-wrap items-center gap-4">
                                <div
                                    class="flex flex-wrap items-center gap-2.5"
                                >
                                    <h4 class="text-custom-sm">
                                        {{ post.user.name }}
                                    </h4>
                                    <span
                                        class="flex w-[3px] h-[3px] rounded-full bg-dark-2"
                                    ></span>
                                    <p class="text-custom-sm">
                                        {{ post.created_at }}
                                    </p>
                                    <span
                                        class="flex w-[3px] h-[3px] rounded-full bg-dark-2"
                                    ></span>
                                </div>

                                <Link
                                    :href="
                                        route('posts.category', {
                                            slug: post.category.slug,
                                        })
                                    "
                                    class="inline-flex text-teal-dark bg-teal/[0.08] font-medium text-custom-sm py-1 px-3 rounded-full"
                                >
                                    {{ post.category.name }}
                                </Link>
                            </div>
                        </div>
                        <div class="mb-5 mt-9">
                            <p v-html="post.content"></p>
                        </div>
                        <div
                            class="flex flex-wrap items-center justify-between gap-10 mt-18"
                        >
                            <ul class="flex items-center gap-3">
                                <li class="text-body">Tags:</li>
                                <li
                                    v-for="(data, index) in post.tags"
                                    :key="index"
                                    class="duration-200 ease-in text-dark hover:text-primary"
                                >
                                    <Link
                                        :href="
                                            route('posts.tag', {
                                                slug: data.slug,
                                            })
                                        "
                                        >#{{ data.name }}</Link
                                    >
                                </li>
                            </ul>

                            <div class="flex items-center gap-3">
                                <p>Share this:</p>

                                <div class="flex items-center gap-2">
                                    <Link
                                        href="#"
                                        @click="shareOnFacebook"
                                        class="flex items-center justify-center w-7.5 h-7.5 rounded-full bg-[#36488f] ease-in duration-200 hover:bg-opacity-95"
                                    >
                                        <svg
                                            width="14"
                                            height="14"
                                            viewBox="0 0 14 14"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M7.7 6.6779V4.7263C7.7 3.9708 8.32679 3.35835 9.1 3.35835H10.5V1.30642L8.5995 1.17378C6.97865 1.06066 5.6 2.31497 5.6 3.90273V6.6779H3.5V8.72984H5.6V12.8334H7.7V8.72984H9.8L10.5 6.6779H7.7Z"
                                                fill="white"
                                            />
                                        </svg>
                                    </Link>
                                    <Link
                                        href="#"
                                        @click="shareOnTwitter"
                                        class="flex items-center justify-center w-7.5 h-7.5 rounded-full bg-[#52A2EC] ease-in duration-200 hover:bg-opacity-95"
                                    >
                                        <svg
                                            width="14"
                                            height="14"
                                            viewBox="0 0 14 14"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M4.44062 12.5562C9.60312 12.5562 12.4031 8.29054 12.4031 4.59366C12.4031 4.50616 12.4031 4.35304 12.3812 4.22179C12.9281 3.82804 13.4094 3.32491 13.7812 2.77804C13.2562 3.01866 12.7313 3.14991 12.1844 3.21554C12.775 2.86554 13.2125 2.31866 13.4094 1.66241C12.8625 1.96866 12.2937 2.20929 11.6156 2.34054C11.0906 1.79366 10.3906 1.44366 9.58125 1.44366C8.02812 1.44366 6.75937 2.71241 6.75937 4.26554C6.75937 4.48429 6.78125 4.70304 6.825 4.92179C4.57188 4.76866 2.51562 3.65304 1.11562 1.96866C0.875 2.40616 0.74375 2.86554 0.74375 3.36866C0.74375 4.35304 1.24687 5.18429 2.0125 5.68741C1.55312 5.66554 1.11563 5.53429 0.74375 5.33741C0.74375 5.35929 0.74375 5.35929 0.74375 5.35929C0.74375 6.69366 1.70625 7.85304 2.975 8.11554C2.73438 8.18116 2.47187 8.20304 2.275 8.20304C2.1 8.20304 1.90312 8.18116 1.75 8.13741C2.12188 9.25304 3.15 10.0624 4.375 10.0843C3.4125 10.828 2.20937 11.2874 0.91875 11.2874C0.65625 11.3312 0.4375 11.2874 0.21875 11.2655C1.4 12.0968 2.86562 12.5562 4.44062 12.5562Z"
                                                fill="white"
                                            />
                                        </svg>
                                    </Link>
                                    <Link
                                        href="#"
                                        @click="shareOnLinkedin"
                                        class="flex items-center justify-center w-7.5 h-7.5 rounded-full bg-[#B1151D] ease-in duration-200 hover:bg-opacity-5"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-linkedin"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4"
                                            />
                                        </svg>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-[370px] w-full">
                        <div class="flex-col gap-10">
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
</template>
