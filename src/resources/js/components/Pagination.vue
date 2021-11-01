<template>
    <ul class="pagination">
        <li class="page-item">
            <button
                class="page-link"
                :disabled="currentPage <= 1"
                @click="$emit('load-prev-page', -1)"
            >
                Previous
            </button>
        </li>
        <li class="page-item">
            <button
                class="page-link"
                :disabled="currentPage >= lastPage"
                @click="$emit('load-next-page', 1)"
            >
                Next
            </button>
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
            currentPage: {
                type: Number,
                required: true,
            },
            lastPage: {
                type: Number,
                required: true,
            }
        },
    }
</script>
