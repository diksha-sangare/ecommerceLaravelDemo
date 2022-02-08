<template>
    <Head title="Blog" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                      Create  Category 
                        <form @submit.prevent="submit">
                            <div>
                                <BreezeLabel for="title" value="Title" />
                                <BreezeInput id="title" name="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus autocomplete="title" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="slug" value="Slug" />
                                <BreezeInput id="slug" name="slug" type="text" class="mt-1 block w-full" v-model="form.slug" required autocomplete="slug" />
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
                title: '',
                slug: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('category.store'))
        },
    }
   
}
</script>
