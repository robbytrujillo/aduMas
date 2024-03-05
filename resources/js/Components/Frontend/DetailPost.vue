<template>
    <Head :title="post.title" />
    <aside id="blogs" aria-label="Related articles" class="py-8 bg-white lg:py-24 dark:bg-gray-900">
        <section class="pb-1 pt-347.5">
            <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
                <div class="flex flex-wrap gap-7.5">
                    
                    <div class="xl-max-w-[770px] w-full mr-7">
                        <img :src="post.image" alt="blog" class="w-full mb-10" />
                        <h1 class="font-bold text-2xl sm:text-4xl lg:text-custom-2 text-dark mb-5.5">
                            {{ post.title }}
                        </h1>

                        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                            <div class="flex flex-wrap items-center gap-4">
                                <div class="flex flex-wrap items-center gap-2.5">
                                    <h4 class="text-custom-sm">
                                        {{ post.user.name }}
                                    </h4>
                                    <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>
                                        <p class="text-custom-sm">{{ post.created_at }}</p>
                                    <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>
                                </div>

                                <Link :href="route('posts.category', { slug: post.category.slug })" 
                                    class="inline-flex text-teal-dark bg-teal/[0.08] font-medium text-custom-sm py-1 px-3 rounded-full">
                                        {{ post.category.name }}
                                </Link>
                            </div>
                        </div>
                        <div class="mt-9 mb-5">
                            <p v-html="post.content"></p>
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-10 mt-18">
                            <ul class="flex items-center gap-3">
                                <li class="text-body">Tags:</li>
                                <li v-for="(data, index) in post.tags" :key="index" class="text-dark hover:text-primary ease-in duration-200">
                                    <Link :href="route('posts.tag', { slug: data.slug })">#{{ data.name }}</Link>
                                </li>
                            </ul>

                            <div class="flex items-center gap-3">
                                <p>Share this:</p>

                                <div class="flex items-center gap-2">
                                    <Link href="#" @click="shareOnFacebook" class="flex items-center justify-center w-7.5 h-7.5 rounded-full bg-[#36488f] ease-in duration-200 hover:bg-opacity-95">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            
                                        </svg>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
</template>