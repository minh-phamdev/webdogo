<template>
    <section class="main-product-block">
        <div class="product-details-row container-1320">
            <!-- Cột trái: Thư viện ảnh bo góc -->
            <div class="left-column">
                <product-gallery />
            </div>

            <!-- Cột phải: Thông tin chính bo góc -->
            <div class="right-column bo-rounded">
                <product-main-info />
            </div>
        </div>
    </section>
</template>

<script setup>
// Nhập các component con
import ProductGallery from './ProductGallery.vue';
import ProductMainInfo from './ProductMainInfo.vue';
</script>

<style scoped>
/* Định nghĩa các biến dóng lề chung cho containter 1320px */
.container-1320 {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
    box-sizing: border-box;
}

.main-product-block {
    width: 100%;
    padding: 40px 0;
}

.product-details-row {
    display: flex;
    justify-content: space-between;
    align-items: stretch;
    /* Đảm bảo hai cột cao bằng nhau */
    gap: 32px;
    /* Khoảng cách giữa hai khối */
}

.left-column {
    flex: 1;
    /* Thư viện ảnh chiếm một nửa dóng lề trái; */

}

.right-column {
    flex: 1;
    /* Thông tin chính chiếm một nửa dóng lề phải; */
    background: var(--wd-surface, #fff);
    /* Nền trắng sạch sẽ */
    border: 1px solid var(--wd-line, #eee);
    display: flex;
    flex-direction: column;
}

/* Helper class bo góc 16px */
.bo-rounded {
    border-radius: 16px;
    overflow: hidden;
}
</style>