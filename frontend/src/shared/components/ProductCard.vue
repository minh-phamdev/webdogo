<template>
    <div class="product-card bo-rounded">
        <!-- Badge Khuyến mãi / Bán chạy (nếu có) -->
        <span v-if="product.badge" class="badge">{{ product.badge }}</span>

        <!-- Ảnh sản phẩm -->
        <div class="product-image-wrap">
            <img :src="product.image || '/placeholder.jpg'" :alt="product.name" loading="lazy" />
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="product-info">
            <h3 class="product-title capitalize">{{ product.name }}</h3>

            <!-- Giá sản phẩm -->
            <div class="product-price">
                <span class="promo-price">{{ formatPrice(product.price) }}</span>
                <span v-if="product.oldPrice" class="old-price">{{ formatPrice(product.oldPrice) }}</span>
            </div>

            <!-- Trạng thái -->
            <div class="product-meta">
                <span class="stock-status">Còn hàng</span>
                <span class="shipping-info">• Giao 3-5 ngày</span>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    product: {
        type: Object,
        required: true,
        default: () => ({
            id: 1,
            name: 'Tượng Gỗ Cao Cấp',
            price: 2500000,
            oldPrice: 3500000,
            image: '',
            badge: ''
        })
    }
})

// Định dạng tiền tệ VNĐ
const formatPrice = (value) => {
    if (!value) return ''
    return typeof value === 'number'
        ? value.toLocaleString('vi-VN') + 'đ'
        : value
}
</script>

<style scoped>
.product-card {
    position: relative;
    background: #fff;
    border: 1px solid var(--wd-line, #eee);
    border-radius: 12px;
    padding: 12px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
    cursor: pointer;
    text-align: left;
}

.product-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    border-color: var(--wd-gold-600, #d4af37);
}

.badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #d9381e;
    color: #fff;
    font-size: 11px;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 4px;
    z-index: 2;
}

.product-image-wrap {
    width: 100%;
    aspect-ratio: 1 / 1;
    background-color: #fbf9f6;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-image-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s;
}

.product-card:hover .product-image-wrap img {
    transform: scale(1.05);
}

.product-info {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.product-title {
    font-size: 14px;
    font-weight: 600;
    color: var(--wd-wood-900, #2c1810);
    margin: 0;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-price {
    display: flex;
    align-items: baseline;
    gap: 8px;
}

.promo-price {
    font-size: 15px;
    font-weight: 700;
    color: #d9381e;
}

.old-price {
    font-size: 12px;
    color: #888;
    text-decoration: line-through;
}

.product-meta {
    font-size: 11px;
    color: #888;
    display: flex;
    gap: 4px;
}

.stock-status {
    color: #2e7d32;
}
</style>