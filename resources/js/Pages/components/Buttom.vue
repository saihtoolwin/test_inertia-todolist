<template>
    <Link
        :href="href"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    >
        {{ text }}
    </Link>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    props: {
        text: String,
        href: String,
    },
    components: {
        Link,
    },
    
};
</script>

<style scoped></style>
