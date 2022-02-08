<template>
    <Head title="Blog" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Blog Category
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                      Create Blog Category 
                      <br>
                      <br>
                        <form @submit.prevent="submit">
                        
                            <div class="mt-4">
                                <BreezeLabel for="slug" value="Select Blog" />
                                    <!-- <BreezeInput id="title" name="blogs" type="text" class="mt-1 block w-full" v-model="form.blogs" required autofocus autocomplete="title" /> -->
                           
                                <select  v-model='form.blog' name="blog" class="border-gray-300 mt-1 block w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value='0' >Select Blog</option>
                                    <option  v-for='blog in blogs' :key="blog.id" :value='blog.id'>{{ blog.title }}</option>
                                </select>
                            </div>
                            <br><br>
                            <div>
                                <BreezeLabel for="title" value="Select Category" />
                                 <!-- <BreezeInput id="title" name="categories" type="text" class="mt-1 block w-full" v-model="form.categories" required autofocus autocomplete="title" /> -->
                           
                                <select v-model='form.category' name="category" class="border-gray-300 mt-1 block w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value='0' >Select Category</option>
                                    <option  v-for='category in categories' :key="category.id" :value='category.id'>{{ category.title }}</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Submit
                                </BreezeButton>
                            </div>
                        </form>
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
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeButton from '@/Components/Button.vue';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeInput,
        BreezeLabel,
        BreezeNavLink,
        Link,
        BreezeButton,
    },
    data() {
        return {
            form: this.$inertia.form({
                blog: '',
                category: ''
            })
        }
    },
    props: {
        blogs: Object,
        categories: Object,
    },
    methods: {
        submit() {
            this.form.post(this.route('blogCategory.store'))
        },
        
    },
   
   
}
</script>
