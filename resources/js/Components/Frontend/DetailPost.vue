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
                        
                    </div>
                </div>
            </div>
        </section>
    </aside>
</template>