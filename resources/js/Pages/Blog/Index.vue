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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Blog 
                        <div class="mb-4">
                            <Link class="px-6 py-2 mb-2 text-green-100 bg-green-500 rounded " :href="route('blogs.create')"> blogs Create</Link>
                        </div>
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Title</td>
                                <td class="px-4 py-2">Description</td>
                                <td class="px-4 py-2">Action</td>
                            </thead>
                            <tbody>
                                <!-- <tr v-for="blog in blogs.data" :key="blog.id">
                                    <td class="px-4 py-2">{{ blog.id }}</td>
                                    <td class="px-4 py-2">{{ blog.title }}</td>
                                    <td class="px-4 py-2">
                                        {{ blog.body }}
                                    </td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link class="text-green-700" :href="route('blogs.edit', blog.id)">Edit</Link>
                                        <Link  @click="destroy(blog.id)" class="text-red-700" >Delete</Link>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <!-- <pagination :links="blogs.links" /> -->
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
    props: {
        // blogs: Object,
    },
    methods: {
        // destroy(id) {
        //     this.$inertia.delete(route("posts.destroy", id));
        // },
    },
}
</script>
