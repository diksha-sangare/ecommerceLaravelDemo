<template>
    <Head title="Blog" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Blog
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


                <div v-if="$page.props.flash.message" id="alert-border-3" class="flex p-4 mb-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium text-green-700">
                        {{ $page.props.flash.message }}
                    </div>
                </div>




                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="flex mb-4">
                            <div class="w-1/2 ">
                               <h2 class="font-semibold text-lg text-gray-800 leading-tight">Blog</h2> 
                            </div>
                            <div class="w-1/2 ">
                                <div class="mb-4 text-right">
                                    <Link class="px-6 py-2 mb-2 text-green-100 bg-green-500 rounded"  :href="route('blog.create')">Create</Link>
                                </div>
                            </div>
                        </div>

                        
                        <br>
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Title</td>
                                <td class="px-4 py-2">Slug</td>
                                <td class="px-4 py-2">Body</td>
                                <td class="px-4 py-2">Image</td>
                                <td class="px-4 py-2">Action</td>
                            </thead>
                            <tbody>
                                <tr v-for="blog in blogs" :key="blog.id">
                                    <td class="px-4 py-2">{{ blog.id }}</td>
                                    <td class="px-4 py-2">{{ blog.title }}</td>
                                    <td class="px-4 py-2">{{ blog.slug }}</td>
                                    <td class="px-4 py-2">{{ blog.body }}</td>
                                    <td class="px-4 py-2">
                                         <img :src="showImage() + blog.image" class="object-cover h-40 w-80"/>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
         BreezeNavLink,
        Link,
    },
    methods: {
        showImage() {
            return "/storage/";
        },
    },
     props: {
        blogs: Object,
    },
   
}
</script>
