<template>
    <Head title="Address" />

    <AuthenticatedLayout>
        <div class="mt-12"></div>

        <div class="max-w-[1000px] mx-auto text-3xl mb-10">
            Your Addresses
        </div>

        <div class="max-w-[1000px] mx-auto flex gap-2 h-[270px]">
            <div class="border border-dotted border-gray-400 rounded-md w-1/3">
                <Link v-if="!$page.props.auth.address" :href="route('address_options.index')">
                    <div class="grid h-full place-items-center cursor-pointer">
                        <div class="text-center">
                            <div class="flex justify-center">
                                <PlusIcon :size="50" />
                            </div>
                            <div class="font-bold text-2xl">Add Address</div>
                        </div>
                    </div>
                </Link>

                <div v-else class="grid h-full place-items-center">
                    <div class="text-center">
                        <div class="font-bold text-2xl">Address is added</div>
                    </div>
                </div>
            </div>

            <div v-if="$page.props.auth.address" class="relative border border-gray-400 rounded-md w-1/3 shadow-md">
                <div class="flex items-center justify-start p-3 text-xs text-gray-600 font-extrabold border-b border-b-gray-400">
                    Default: <img class="h-3 mt-1.5 ml-2" src="/images/logo/AMAZON_LOGO_DARK.png" alt="">
                </div>
                <div class="text-sm font-extrabold px-4 pt-4">
                    {{ $page.props.auth.user.first_name }} {{ $page.props.auth.user.last_name }}
                </div>
                <div class="text-sm px-4">
                    <div>{{ $page.props.auth.address.addr1 }}</div>
                    <div>{{ $page.props.auth.address.addr2 }}</div>
                    <div>{{ $page.props.auth.address.city }}</div>
                    <div>{{ $page.props.auth.address.postcode }}</div>
                    <div>{{ $page.props.auth.address.country }}</div>
                </div>
                <div class="px-4 absolute bottom-0 pb-4">
                    <Link
                        :href="route('address_options.destroy', { id: $page.props.auth.address.id })"
                        method="delete"
                        as="button"
                        class="text-teal-700 text-sm font-extrabold hover:underline hover:text-red-700"
                    >
                        Remove
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { toRefs } from 'vue'
import MapMarkerOutlineIcon from 'vue-material-design-icons/MapMarkerOutline.vue'
import PlusIcon from 'vue-material-design-icons/Plus.vue'

const props = defineProps({product: Object});
const { product } = toRefs(props)
</script>
