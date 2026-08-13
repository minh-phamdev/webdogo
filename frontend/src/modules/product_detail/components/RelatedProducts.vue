<template>
    <section class="related-products bo-rounded">
        <div class="section-container container-1320">
            <div class="section-header">
                <h2 class="section-title">Sản phẩm liên quan</h2>
            </div>

            <!-- Tái sử dụng grid 4 cột dóng hàng dều từ Trang chủ -->
            <div class="related-grid container-1320">
                <product-card v-for="product in relatedProducts" :key="product.id" :product="product" />
            </div>
        </div>
    </section>
</template>

<script setup>
// Nhập ProductCard đã được định nghĩa
import ProductCard from '@/shared/components/ProductCard.vue'
// Danh sách sản phẩm UNIQUE, capitalization sạch sẽ, dóng dều lề dều (vertical align)
const relatedProducts = [
    { id: 101, name: 'Tượng Phật Bà Quan Âm Gỗ', price: 2500000, oldPrice: 5500000, image: 'path/to/quan-am.jpg', isRelated: true, capitalization: 'nhất quán' },
    { id: 102, name: 'Cóc Ngậm Tiền Gỗ Mun', price: 2500000, oldPrice: 5500000, image: 'path/to/coc.jpg', isRelated: true, capitalization: 'nhất quán' },
    { id: 103, name: 'Tỳ Hưu Gỗ Mun Sừng Phong Thủy', price: 2500000, oldPrice: 3500000, image: 'path/to/ty-huu.jpg', isRelated: true, capitalization: 'nhất quán' },
    { id: 104, name: 'Tranh Gỗ Phúc Lộc Thọ', price: 2500000, oldPrice: 3000000, image: 'path/to/tranh.jpg', isRelated: true, capitalization: 'nhất quán' }
];
</script>

<style scoped>
.related-products {
    width: 100%;
    padding: 40px 0;
    box-sizing: border-box;
}

.section-container {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.section-title {
    position: relative;
    display: inline-block;
    margin: 0;
    padding-bottom: 8px;
    font-family: serif;
    font-size: 24px;
    font-weight: 700;
    color: #2c1810;
}

.section-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 48px;
    height: 3px;
    background: #d4af37;
    border-radius: 999px;
}

.related-grid {
    width: 100%;
    display: grid;
    /* BẮT BUỘC dùng minmax(0, 1fr) thay vì 1fr để chống tràn viền */
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px;
    box-sizing: border-box;
}

/* Thêm Responsive để không vỡ giao diện trên tablet/mobile */
@media (max-width: 1024px) {
    .related-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 576px) {
    .related-grid {
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }
}
</style>