<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-capitalize">{{ product.name }}</h5>
            <h4 class="card-subtitle mb-2 text-primary">${{ product.price }}</h4>
            <p class="card-text">{{ product.description }}</p>
            <a href="#" class="card-link">{{ product.category }}</a>
        </div>
        <div
            :class="[isAvailable.class]"
            class="card-footer bg-success text-white"
        >
            {{ isAvailable.title }}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            product: {
                type: Object,
                required: true,
            }
        },
        computed: {
            isAvailable() {
                if (this.product.available) {
                    return {
                        class: 'bg-success',
                        title: 'Available',
                    }
                }

                return {
                    class: 'bg-danger',
                    title: 'Not available',
                }
            }
        }
    }
</script>
