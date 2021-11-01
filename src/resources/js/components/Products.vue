<template>
    <div class="row">
        <div class="col-12">
            <h1>Products</h1>
        </div>
        <div class="col-2">
            <filters v-on:submit-filter-form="submitFilterForm" />
        </div>
        <div class="col-10">
            <div class="row">
                <div v-if="loading" class="col-12">
                    Loading...
                </div>
                <template v-else>
                    <div
                        v-for="product in products"
                        :key="product.id"
                        class="col-sm-4"
                    >
                        <product :product="product" />
                    </div>
                    <div class="col-12">
                        <pagination
                            :currentPage="page"
                            :lastPage="lastPage"
                            v-on:load-prev-page="changePage"
                            v-on:load-next-page="changePage"
                        />
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
            loading: true,
            perPage: 20,
            page: 1,
            lastPage: 1,
        }
    },
    mounted() {
        this.getQueryParams();
        this.loadProducts();
    },
    methods: {
        getQueryParams() {
            const queryString = window.location.search;
            if (!queryString) {
                this.perPage = 20;
                this.page = 1;
                return;
            }

            const urlParams = new URLSearchParams(queryString);
            this.perPage = urlParams.has('perPage') ? urlParams.get('perPage') : 20;
            this.page = urlParams.has('page') ? urlParams.get('page') : 1;
        },
        loadProducts(filterParams = '') {
            this.loading = true;
            axios.get(`api/products?perPage=${this.perPage}&page=${this.page}${filterParams}`)
                .then(response => {
                    this.products = response.data.data;
                    this.lastPage = response.data.meta.last_page;
                    this.loading = false;
                });
        },
        changePage($event) {
            this.page += $event;
            this.loadProducts();
        },
        submitFilterForm($event) {
            this.loadProducts();
        }
    }
}
</script>

<style scoped>
    .row > div[class*='col-'] {
        display: flex;
        flex: 1 0 auto;
        margin-bottom: 1.5rem;
    }
</style>
