<template>
    <div class="product-detail-page">
        <!-- 1. Header dùng chung -->
        <AppHeader />

        <main class="page-content">
            <!-- 2. Khối ảnh + Giá + Nút Mua hàng (Gây ấn tượng & ra quyết định nhanh) -->
            <MainProductBlock />

            <!-- 3. Khối Tabs: Mô tả, Phong thủy, Cách trưng bày, Thông số, Đánh giá -->
            <ProductDescriptionTabs />

            <!-- 4. Khối Sản phẩm liên quan (Gợi ý thêm sản phẩm để giữ chân khách) -->
            <RelatedProducts />
        </main>

        <!-- 5. Footer dùng chung -->
        <AppFooter />
    </div>
</template>

<script setup>
// Header & Footer
import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

// Lùi 1 cấp từ thư mục `views` ra `product_detail` rồi vào `components`
import MainProductBlock from '../components/MainProductBlock.vue'
import ProductDescriptionTabs from '../components/ProductDescriptionTabs.vue'
import RelatedProducts from '../components/RelatedProducts.vue'
</script>

<style scoped>
.product-detail-page {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: var(--wd-bg, #fbf9f6);
    /* Tông kem ấm đồng bộ toàn web */
}

.page-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 40px;
    /* Tạo khoảng thở đều 40px giữa các khối component */
    padding-bottom: 60px;
}
</style>