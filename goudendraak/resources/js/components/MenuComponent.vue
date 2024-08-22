<template>
    <div>
        <div class="d-flex justify-content-center align-items-center mb-4">
            <div class="me-3">
                <input type="text" v-model="search" class="form-control form-control-lg" placeholder="Zoek menu...">
            </div>
            <div>
                <select v-model="selectedSoortgerecht" id="soortgerecht" class="form-select form-select-lg">
                    <option value="">Filter op soort gerecht</option>
                    <option v-for="soort in uniqueSoortgerechten" :key="soort" :value="soort">
                        {{ soort }}
                    </option>
                </select>
            </div>
        </div>

        <div class="row">
            <div v-for="menu in filteredMenus" :key="menu.id" class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark">{{ menu.naam }}</h5>
                        <p class="card-text text-muted">{{ menu.soortgerecht }}</p>
                        <p class="card-text text-success fw-bold">€{{ menu.price.toFixed(2) }}</p>
                        <p class="card-text text-secondary">{{ menu.beschrijving }}</p>
                        <form @submit.prevent="addToCart(menu.id)">
                            <button type="submit" class="btn btn-primary w-100">Voeg toe aan winkelwagen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <nav>
            <ul class="pagination justify-content-center mt-4">
                <li v-for="page in totalPages" :key="page" class="page-item" :class="{ active: currentPage === page }">
                    <button class="page-link" @click="goToPage(page)">
                        {{ page }}
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: ['menus'],
    data() {
        return {
            search: '',
            selectedSoortgerecht: '',
            currentPage: 1,
            itemsPerPage: 12
        };
    },
    computed: {
        uniqueSoortgerechten() {
            const soorten = this.menus.map(menu => menu.soortgerecht);
            return [...new Set(soorten)];
        },
        filteredMenus() {
            let filtered = this.menus.filter(menu =>
                menu.naam.toLowerCase().includes(this.search.toLowerCase())
            );

            if (this.selectedSoortgerecht) {
                filtered = filtered.filter(menu =>
                    menu.soortgerecht === this.selectedSoortgerecht
                );
            }

            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return filtered.slice(start, end);
        },
        totalPages() {
            let filtered = this.menus.filter(menu =>
                menu.naam.toLowerCase().includes(this.search.toLowerCase())
            );

            if (this.selectedSoortgerecht) {
                filtered = filtered.filter(menu =>
                    menu.soortgerecht === this.selectedSoortgerecht
                );
            }

            return Math.ceil(filtered.length / this.itemsPerPage);
        }
    },
    methods: {
        goToPage(page) {
            this.currentPage = page;
        },
        addToCart(menuId) {
            axios.post('/store', { id: menuId })
                .then(() => {
                    this.$root.$emit('cart-updated');
                    location.reload();
                })
                .catch(error => {
                    console.error('Status:', error.response.status);
                    console.error('Data:', error.response.data);
                    console.error('Er is een fout opgetreden bij het toevoegen aan de winkelwagen:', error);
                });
        }
    }
};
</script>
