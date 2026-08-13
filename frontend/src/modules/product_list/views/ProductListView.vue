<template>
    <div class="product-list-page">
        <AppHeader />

        <!-- 1. Banner Tiêu đề Trang (Đồng bộ style Trang chủ) -->
        <section class="page-header">
            <div class="container-1320 text-center">
                <span class="breadcrumb">Trang chủ / Sản phẩm</span>
                <h1 class="page-title serif">Danh mục sản phẩm đồ gỗ</h1>
                <div class="gold-divider"></div>
            </div>
        </section>

        <!-- 2. Thân trang -->
        <main class="page-content">
            <div class="container-1320">
                <div class="layout-grid">

                    <!-- Sidebar Bộ lọc -->
                    <ProductFilterSidebar @filter-change="handleFilterChange" />

                    <!-- Khu vực Sản phẩm -->
                    <div class="main-content">
                        <ProductSortBar :totalItems="products.length" @sort-change="handleSortChange" />
                        <ProductGrid :products="products" />
                    </div>

                </div>
            </div>
        </main>

        <AppFooter />
    </div>
</template>

<script setup>
import { ref } from 'vue'

import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

import ProductFilterSidebar from '../components/ProductFilterSidebar.vue'
import ProductSortBar from '../components/ProductSortBar.vue'
import ProductGrid from '../components/ProductGrid.vue'

// Dữ liệu mẫu hình ảnh tượng gỗ thực tế
const products = ref([
    {
        id: 1,
        name: 'Tượng Di Lặc Ngũ Phúc Gỗ Hương Nguyên Khối',
        woodType: 'Gỗ Hương Gia Lai',
        dimensions: 'Cao 81cm x Ngang 48cm',
        price: 5500000,
        image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=500&auto=format&fit=crop&q=80'
    },
    {
        id: 2,
        name: 'Cóc Ngậm Tiền Thiềm Thừ Gỗ Mun Sừng',
        woodType: 'Gỗ Mun Sừng',
        dimensions: 'Cao 30cm x Ngang 35cm',
        price: 2250000,
        image: 'https://images.unsplash.com/photo-1544816155-12df9643f363?w=500&auto=format&fit=crop&q=80'
    },
    {
        id: 3,
        name: 'Tượng Quan Công Cưỡi Ngựa Gỗ Trắc Đỏ',
        woodType: 'Gỗ Trắc Đỏ',
        dimensions: 'Cao 68cm x Ngang 40cm',
        price: 8900000,
        image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=500&auto=format&fit=crop&q=80'
    }
])

const handleFilterChange = (filters) => {
    console.log('Bộ lọc cập nhật:', filters)
}

const handleSortChange = (sortType) => {
    console.log('Kiểu sắp xếp:', sortType)
}
</script>

<style scoped>
.product-list-page {
    background-color: #faf8f5;
    min-height: 100vh;
}

.serif {
    font-family: 'Playfair Display', 'Merriweather', Georgia, serif;
}

.text-center {
    text-align: center;
}

/* Page Header đồng bộ Trang Chủ */
.page-header {
    padding: 35px 0 10px;
    background: #faf8f5;
}

.breadcrumb {
    font-size: 13px;
    color: #8c7a6b;
    display: block;
    margin-bottom: 6px;
}

.page-title {
    font-size: 28px;
    color: #2c1810;
    margin: 0;
    font-weight: 700;
}

/* Vạch vàng kim đặc trưng giống Trang chủ */
.gold-divider {
    width: 60px;
    height: 3px;
    background: #c59b27;
    margin: 12px auto 0 auto;
    border-radius: 2px;
}

.page-content {
    padding: 25px 0 60px;
}

.container-1320 {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
}

.layout-grid {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 24px;
}

@media (max-width: 850px) {
    .layout-grid {
        grid-template-columns: 1fr;
    }
}
</style>