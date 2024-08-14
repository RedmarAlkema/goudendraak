<template>
    <div>
        <div class="search-filter-container">
           
            <div class="search-container">                              
                <input type="text" v-model="search" placeholder="Zoek menu..." />
            </div>
            <div class="filter-container">
                <label for="soortgerecht">Filter soort gerecht:</label>
                <select v-model="selectedSoortgerecht" id="soortgerecht">
                    <option value="">Alles</option>
                    <option v-for="soort in uniqueSoortgerechten" :key="soort" :value="soort">
                        {{ soort }}
                    </option>
                </select>
            </div>
        </div>
        <div class="menu-container">
            <div v-for="menu in filteredMenus" :key="menu.id" class="menu-item">
                <h3>{{ menu.naam }}</h3>
                <p>{{ menu.soortgerecht }}</p>
                <p>€{{ menu.price.toFixed(2) }}</p>
                <p>{{ menu.beschrijving }}</p>
                <form @submit.prevent="addToCart(menu.id)">
                    <button type="submit">Voeg toe aan winkelwagen</button>
                </form>
            </div>
        </div>
        <div class="pagination">
            <button 
                v-for="page in totalPages" 
                :key="page" 
                @click="goToPage(page)"
                :class="{ active: currentPage === page }"
            >
                {{ page }}
            </button>
        </div>
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
            itemsPerPage: 20
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
                .then(response => {
                    this.$root.$emit('cart-updated');
                    alert('Item toegevoegd aan de winkelwagen!');
                })
                .catch(error => {
                    console.error('Status:', error.response.status);
                    console.error('Data:', error.response.data);
                    console.error('Er is een fout opgetreden bij het toevoegen aan de winkelwagen:', error);
                    alert('Kon het item niet toevoegen aan de winkelwagen.');
                });
        }
    }
};
</script>

<style scoped>
.search-filter-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.search-container {
    margin-right: 20px;
    margin-top: 18px;
}

.search-container input {
    padding: 10px;   
    width: 300px;
    border: 2px solid #d4af37;
    border-radius: 5px;
}

.filter-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.filter-container select {
    padding: 10px;
    width: 300px;
    border: 2px solid #d4af37;
    border-radius: 5px;
}

.menu-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.menu-item {
    background-color: #ff0000;
    color: #d4af37;
    border-radius: 10px;
    padding: 10px;
    margin: 10px;
    width: 22%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.menu-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

.menu-item h3 {
    margin-top: 0;
    color: #fff;
}

.pagination {
    text-align: center;
    margin-top: 20px;
}

.pagination button {
    background-color: #d4af37;
    color: #ff0000;
    border: none;
    padding: 10px 20px;
    margin: 0 5px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.pagination button:hover {
    background-color: #b8860b;
}

.pagination button.active {
    background-color: #ffd700;
    font-weight: bold;
    cursor: default;
}

.pagination button:disabled {
    background-color: #ffd700;
    cursor: not-allowed;
}
</style>
