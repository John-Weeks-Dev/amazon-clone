<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="
            w-full
            text-center
            items-center
            px-4
            py-1.5
            bg-[#fcba1f]
            border
            border-gray-600
            rounded-sm
            text-sm
            font-extrabold
            text-black
        "
    >
        <slot />
    </button>
</template>
