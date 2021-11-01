<template>
    <form @submit="submitForm">
        <div class="form-row mb-3">
            <div class="col-6">
                <label for="price-min">Price Min</label>
                <input type="number" class="form-control" id="price-min" placeholder="1" v-model="form.priceMin" required>
            </div>
            <div class="col-6">
                <label for="price-max">Price Max</label>
                <input type="number" class="form-control" id="price-max" placeholder="999" v-model="form.priceMax" required>
            </div>
        </div>
        <div class="mb-3">
            <div
                v-for="category in categories"
                :key="category.id"
                class="form-check"
            >
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" :value="category.id" v-model="form.categories">
                    {{ category.name }}
                </label>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" value="1" v-model="form.available">
                    Available
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" value="0" v-model="form.available">
                    Not available
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            categories: [],
            form: {
                priceMin: null,
                priceMax: null,
                categories: [],
                available: null,
            }
        }
    },
    mounted() {
        axios.get(`api/categories`)
            .then(response => {
                this.categories = response.data.data;
            });
    },
    methods: {
        submitForm(event) {
            event.preventDefault();

            this.$emit('submit-filter-form', this.form);
        }
    }
}
</script>
